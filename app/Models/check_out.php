<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class check_out extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'check_out';
    protected $table = 'check_out';
    protected $casts = [
        'fecha_salida' => 'date',
        'hora_salida' => 'datetime',
    ];
    
    protected $fillable = [
        'id_check_in',
        'id_administrador',
        'entrega_llaves',
        'forma_pago',
        'estado_pago',
        'fecha_salida',
        'hora_salida',
        'descripcion_estadia',
    ];

    public function Check_in(){
        return $this->belongsTo(check_in::class, 'id_check_in', "id");
    }

    public function Administrador(){
        return $this->belongsTo(administrador::class, "id_administrador", "id" );
    }
}
    