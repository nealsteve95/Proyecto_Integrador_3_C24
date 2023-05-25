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
    protected $casts = ['fecha_salida' => 'datetime'];
    protected $fillable = [
        'id_check_in',
        'id_recepcionista',
        'entrega_llaves',
        'forma_pago',
        'estado_pago',
        'fecha_salida',
        'descripcion_estadia',
    ];
}
