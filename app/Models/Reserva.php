<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_huesped',
        'id_habitacion',
        'datosReserva',
    ];
    public function huesped()
    {
        return $this->belongsTo(Huesped::class, 'id_huesped');
    }
    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'id_habitacion');
    }
    protected $collection = "Reservas";
    
}
