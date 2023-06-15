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
        'datosReserva',
    ];
    public function huesped()
    {
        return $this->belongsTo(Huesped::class, 'id_huesped');
    }
    protected $collection = "Reservas";
    
}
