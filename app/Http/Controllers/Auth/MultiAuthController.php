<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

public function login(Request $request)
{
    $request->validate([
        'tipo_usuario' => 'required|in:admin,estudiante,dependencia',
        'login_field' => 'required',
        'password' => 'required',
    ]);

    $tipo = $request->tipo_usuario;
    $password = $request->password;
    $loginValue = $request->login_field;

    if ($tipo === 'estudiante') {
        // IMPORTANTE: El nombre de la llave debe coincidir con tu base de datos
        if (Auth::guard('estudiante')->attempt([
            'numero_control' => $loginValue, 
            'password' => $password
        ])) {
            $request->session()->regenerate();
            auth()->shouldUse('estudiante');
            return redirect()->intended('/estudiante/dashboard');
        }
    } 
    
    if ($tipo === 'dependencia') {
        if (Auth::guard('dependencia')->attempt([
            'rfc' => $loginValue, 
            'password' => $password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/dependencia/dashboard');
        }
    }

    // Si es admin o si fallan los anteriores
    if (Auth::attempt(['email' => $loginValue, 'password' => $password])) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors(['login_field' => 'Las credenciales no coinciden.']);
}
    /*
    public function login(Request $request)
{
    $request->validate([
        'tipo_usuario' => 'required|in:admin,estudiante,dependencia',
        'login_field' => 'required',
        'password' => 'required',
    ]);

    $tipo = $request->tipo_usuario;
    $password = $request->password;
    $loginValue = $request->login_field;

    if ($tipo === 'estudiante') {
        // IMPORTANTE: El nombre de la llave debe coincidir con tu base de datos
        if (Auth::guard('estudiante')->attempt([
            'numero_control' => $loginValue, 
            'password' => $password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/estudiante/dashboard');
        }
    } 
    
    if ($tipo === 'dependencia') {
        if (Auth::guard('dependencia')->attempt([
            'rfc' => $loginValue, 
            'password' => $password
        ])) {
            $request->session()->regenerate();
            return redirect()->intended('/dependencia/dashboard');
        }
    }

    // Si es admin o si fallan los anteriores
    if (Auth::attempt(['email' => $loginValue, 'password' => $password])) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors(['login_field' => 'Las credenciales no coinciden.']);
}
    */   
}