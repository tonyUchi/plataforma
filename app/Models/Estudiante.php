<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    protected $fillable = [
        'numero_control',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password',
        'campus',
        'documento_registro_path',
        'validado_por_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }
}
