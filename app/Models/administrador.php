<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class administrador extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'administrador';
    protected $table = 'administrador';
    protected $primaryKey = 'id'; // se creara una _id por defecto, pero se usara esta id para las operaciones de llaves.
    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'turno',
        'telefono_celular',
        'correo_electronico',
        'DNI',
        'contraseña',
        'permisos',
    ];

    public function Check_in() {
        return $this->hasMany(check_in::class);
    }

    public function Check_out() {
        return $this->hasMany(check_out::class);
    }
}