<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthController extends Controller
{
    /**
     * Muestra el formulario de login único.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Maneja la lógica de autenticación para múltiples guards.
     */
    public function login(Request $request)
    {
        // 1. Validación de los datos de entrada
        $request->validate([
            'tipo_usuario' => 'required|in:admin,estudiante,dependencia',
            'login_field'  => 'required|string',
            'password'     => 'required|string',
        ]);

        $tipo = $request->tipo_usuario;
        $loginValue = $request->login_field;
        $password = $request->password;

        // 2. Determinar el campo de identidad y el Guard según el tipo
        if ($tipo === 'estudiante') {
            $credentials = ['numero_control' => $loginValue, 'password' => $password];
            $guard = 'estudiante';
        } elseif ($tipo === 'dependencia') {
            $credentials = ['rfc' => $loginValue, 'password' => $password];
            $guard = 'dependencia';
        } else {
            // Admin usa el guard por defecto 'web' y el campo 'email'
            $credentials = ['email' => $loginValue, 'password' => $password];
            $guard = 'web';
        }

        // 3. Intentar el inicio de sesión
        if (Auth::guard($guard)->attempt($credentials, $request->filled('remember'))) {
            
            // Regenerar sesión por seguridad
            $request->session()->regenerate();

            // Informar a Laravel qué guard debe priorizar en esta sesión
            auth()->shouldUse($guard);

            // Redirigir al dashboard correspondiente
            return redirect()->intended($this->redirectPath($tipo));
        }

        // 4. Si falla, regresar con error
        return back()->withErrors([
            'login_field' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->withInput($request->only('login_field', 'tipo_usuario'));
    }

    /**
     * Determina la ruta de redirección según el tipo de usuario.
     */
    protected function redirectPath($tipo)
    {
        return match ($tipo) {
            'estudiante'  => '/estudiante/dashboard',
            'dependencia' => '/dependencia/dashboard',
            default       => '/admin/dashboard',
        };
    }

    /**
     * Cierra la sesión de todos los guards y limpia la sesión.
     */
    public function logout(Request $request)
    {
        // Cerramos sesión en todos los posibles guards para evitar conflictos
        Auth::guard('web')->logout();
        Auth::guard('estudiante')->logout();
        Auth::guard('dependencia')->logout();

        // Invalidar y limpiar el token de la sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}