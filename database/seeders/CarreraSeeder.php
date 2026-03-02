<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = [
            ['nombre' => 'Ingeniería en Sistemas Computacionales', 'abreviatura' => 'ISC'],
            ['nombre' => 'Ingeniería Industrial', 'abreviatura' => 'II'],
            ['nombre' => 'Ingeniería Civil', 'abreviatura' => 'IC'],
            ['nombre' => 'Licenciatura en Administración', 'abreviatura' => 'LA'],
            ['nombre' => 'Ingeniería Mecatrónica', 'abreviatura' => 'IM'],
        ];

        foreach ($carreras as $carrera) {
            Carrera::create($carrera);
        }
    }
}