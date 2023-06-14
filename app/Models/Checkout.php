<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_checkin', 
        'id_recepcionista',
        'forma_pago',
        'estado_pago',
        'descripcion_salida',
        'fecha_salida',
    ];

    protected $collection = "Checkouts";
}
