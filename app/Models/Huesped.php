<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Huesped extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = "Huespedes";
    protected $table = 'huespedes';
    protected $fillable = [
        'identificacion',
        'tipo_identificacion',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'nacionalidad',
        'region_direccion',
        'telefono',
        'correo',
        'empresa', // esta en formato json()
    ];

}
