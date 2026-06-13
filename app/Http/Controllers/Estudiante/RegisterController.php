<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Muestra el formulario (dentro de tu carpeta views/estudiante)
    public function showRegisterForm()
    {
        $carreras = Carrera::all();
        return view('estudiante.registro', compact('carreras'));
    }

    // Procesa el registro del alumno
    public function register(Request $request)
    {
        $request->validate([
            'carrera_id' => 'required|exists:carreras,id',
            'numero_control' => 'required|string|unique:estudiantes,numero_control',
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:estudiantes,email',
            'password' => 'required|string|min:8|confirmed',
            'campus' => 'required|string|max:255',
            'documento_registro' => 'required|file|mimes:pdf|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('documento_registro')) {
            $path = $request->file('documento_registro')->store('documentos_registro', 'public');
        }

        Estudiante::create([
            'carrera_id' => $request->carrera_id,
            'numero_control' => $request->numero_control,
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'campus' => $request->campus,
            'documento_registro_path' => $path,
            'validado_por_admin' => false, 
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Espera la validación del administrador.');
    }
}
