<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class cochera extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'cochera';
    protected $table = 'cochera';
    protected $fillable = [
        'id_huesped',
        'id_check_in',
        'placa',
        'color',
        'modelo',
    ];
}