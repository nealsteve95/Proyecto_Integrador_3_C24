<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Huesped;

class cochera extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'cochera';
    protected $table = 'cochera';
    protected $fillable = [
        'id_huesped',
        'placa',
        'color',
        'modelo',
    ];

public function Huesped() {
    return $this->belongsTo(huesped::class, "id_huesped", "id_huesped");
}
}