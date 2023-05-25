<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class check_in extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'check_in';
    protected $primaryKey = 'id';
    protected $casts = ['fecha_ingreso' => 'datetime'];
    protected $table = 'check_in';
    protected $fillable = [
        'id',
        'id_huesped',
        'nro_habitacion',
        'id_recepcionista',
        'tipo_reserva',
        'paxs',
        'cant_dias',
        'motivo_viaje',
        'fecha_ingreso',
        'nota_adicional',
    ];
}
