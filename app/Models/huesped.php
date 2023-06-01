<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Cochera;
use App\Models\Reserva;
class huesped extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'huesped';
    protected $primaryKey = 'id_huesped';
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
        'contraseña',
        'id_empresa', // esta en formato json()
    ];


    public function cochera(){
        return $this->hasOne(cochera::class, "id_huesped", "id_huesped");     
    }

    public function Reserva(){
        return $this->hasMany(reserva::class, "id_huesped", "id_huesped");
    }
}