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
    protected $casts = [
        'fecha_ingreso' => 'date',
        'hora_ingreso' => 'datetime',
    ];
    protected $table = 'check_in';
    protected $fillable = [
        'id',
        'id_reserva',
        'id_administrador',
        'tipo_reserva',
        'paxs',
        'motivo_viaje',
        'fecha_ingreso',
        'hora_ingreso',
        'nota_adicional',
    ];

    public function Servicios_y_consumos(){
        return $this->hasMany(servicios_y_consumos::class, "id", "id_check_in");
    }

    public function Reserva(){
        return $this->belongsTo(reserva::class, "id_reserva", "id");
    }

    public function Administrador(){
        return $this->belongsTo(administrador::class, "id_administrador", "id");
    }
    
    public function Check_out(){
        return $this->hasOne(check_out::class, "id", "id_check_in");
    }
}
