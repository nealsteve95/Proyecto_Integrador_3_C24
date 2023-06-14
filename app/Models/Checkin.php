<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;

    protected $collection = "Checkins";
    protected $fillable = [
        'id_huesped', 
        'nro_habitacion',
        'id_recepcionista',
        'tipo_reserva',
        'paxs',
        'cantidad_dias',
        'motivo_viaje',
        'fecha_ingreso',
        'nota_adicionales',
        'estado',
    ];
}
