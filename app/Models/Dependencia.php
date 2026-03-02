<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Dependencia extends Authenticatable
{
    use Notifiable;

    protected $table = 'dependencias';

    protected $fillable = [
        'rfc',
        'nombre_completo',
        'direccion',
        'telefono',
        'email',
        'password',
        'sector',
        'nombre_responsable',
        'cargo_responsable',
        'web_url',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }
}
