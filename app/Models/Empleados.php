<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
     protected $fillable = [
        'identidad',
        'nombre',
        'apellido',
        'correo',
        'cargo',
        'salario',
        'estado',
        'fecha_ingreso',
    ];
}
