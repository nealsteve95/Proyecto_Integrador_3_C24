<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class huesped extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'huesped';
    protected $table = 'huesped';
    protected $fillable = [
        'id_huesped',
        'tipo_identificacion',
        'nombres',
        'apellidos',
        'sexo',
        'fecha_nacimiento',
        'nacionalidad',
        'region_direccion',
        'telefono',
        'correo',
        'id_empresa', // esta en formato json()
    ];
}