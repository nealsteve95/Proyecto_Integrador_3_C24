<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Huesped extends Model
{
    use HasFactory;

    protected $fillable = [
        'identificacion',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'nacionalidad',
        'region',
        'direccion',
        'telefono',
        'correo',
        'empresa'
    ];

    protected $collection = "Huespedes";
}
