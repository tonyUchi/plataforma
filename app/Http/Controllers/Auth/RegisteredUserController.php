<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Dependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validaciones base (comunes para ambos)
        $commonRules = [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:estudiantes', 'unique:dependencias'],
            'password' => ['required', 'confirmed', 'min:8'],
            'tipo_usuario' => ['required', 'in:estudiante,dependencia'],
        ];

        // 2. Lógica según el tipo de usuario
        if ($request->tipo_usuario === 'estudiante') {
            $request->validate(array_merge($commonRules, [
                'nombre' => ['required', 'string'],
                'numero_control' => ['required', 'unique:estudiantes'],
                'carrera_id' => ['required', 'exists:carreras,id'],
            ]));

            $user = Estudiante::create([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'numero_control' => $request->numero_control,
                'email' => $request->email,
                'carrera_id' => $request->carrera_id,
                'password' => Hash::make($request->password),
            ]);

            Auth::guard('estudiante')->login($user);
            return redirect('/estudiante/dashboard');

        } else {
            $request->validate(array_merge($commonRules, [
                'nombre_institucion' => ['required', 'string'],
                'rfc' => ['required', 'unique:dependencias'],
                'nombre_responsable' => ['required'],
            ]));

            $user = Dependencia::create([
                'nombre_institucion' => $request->nombre_institucion,
                'rfc' => $request->rfc,
                'nombre_responsable' => $request->nombre_responsable,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'password' => Hash::make($request->password),
            ]);

            Auth::guard('dependencia')->login($user);
            return redirect('/dependencia/dashboard');
        }
    }
}