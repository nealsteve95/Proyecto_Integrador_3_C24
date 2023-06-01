<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Habitacion;

class reserva extends Model

{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'reserva';
    protected $primaryKey = 'id';
    protected $table = 'reserva';
    protected $fillable = [
        'id',
        'id_huesped',
        'fecha_reserva',
        'cant_dias',
        'nro_acompañantes',
    ];

    // belongsToMany se utiliza para N:N, no obstante en esta BD mongoDB, no es necesario utilizar, aprovechando las funciones de enlistar las ID en un solo campo
    public function Reserva_habitacion()
    {
        return $this->hasMany(reserva_habitacion::class, 'id', 'id_reserva');
    }

    public function Check_in(){
        return $this->hasOne(check_in::class);
    }

    public function Huesped(){
        return $this->belongsTo(huesped::class, "id_huesped", "id_huesped");
    }
}   
