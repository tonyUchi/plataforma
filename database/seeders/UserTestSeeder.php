<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Estudiante;
use App\Models\Dependencia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTestSeeder extends Seeder
{
    public function run()
{
    // 1. Crear Admin
    User::create([
        'name' => 'Admin Sistema',
        'email' => 'admin@test.com',
        'password' => Hash::make('12345678'),
    ]);

    // 2. Crear Estudiante
    Estudiante::create([
        'nombre' => 'Juan',
        'apellido_paterno' => 'Pérez',
        'apellido_materno' => 'García',
        'numero_control' => '20001111',
        'email' => 'juan@estudiante.com',
        'carrera_id' => 1,
        'campus' => 'centro',
        'password' => Hash::make('12345678'),
    ]);

    // 3. Crear Dependencia
    Dependencia::create([
        'nombre_completo' => 'Empresa Patito',
        'rfc' => 'PATO123456H01',
        'direccion' => 'Av. siempre viva',
        'nombre_responsable' => 'Ing. López',
        'cargo_responsable' => 'jefe de jefes',
        'sector' => 'publico',
        'email' => 'contacto@empresa.com',
        'telefono' => '1234567890',
        'password' => Hash::make('12345678'),
    ]);
    }
}