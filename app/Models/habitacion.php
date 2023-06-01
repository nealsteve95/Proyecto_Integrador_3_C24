<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;


class habitacion extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'habitacion';
    protected $primaryKey = 'nro_habitacion';
    protected $table = 'habitacion';
    protected $fillable = [
        'nro_habitacion',
        'nro_piso',
        'tipo_habitacion',
        'precio',
        'estado',
        'caracteristicas',
        'cant_reservas'
    ];


    public function Reserva()
    {
            return $this->hasMany(Reserva::class, 'nro_habitacion', 'nro_habitaciones');
    }
}

