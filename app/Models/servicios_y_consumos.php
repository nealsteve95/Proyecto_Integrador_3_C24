<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class servicios_y_consumos extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'servicios_y_consumos';
    protected $table = 'servicios_y_consumos';
    protected $fillable = [
        'id_check_in',
        'costo',
        'descripcion',
        'tipo',
    ];
}
