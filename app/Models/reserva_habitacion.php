<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class reserva_habitacion extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'reserva_habitacion';
    protected $primaryKey = 'id';
    protected $table = 'reserva_habitacion';
    protected $fillable = [
        'id',
        'id_reserva',
        'nro_habitaciones'
    ];
    public function Reserva(){
        return $this->belongsTo(reserva::class, "id_reserva", "id");
    }
    public function Habitacion(){
        return $this->belongsTo(habitacion::class, "nro_habitaciones", "nro_habitacion");
    }
}
