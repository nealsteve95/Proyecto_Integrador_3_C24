<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Check_in;

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

    public function Check_in(){
        return $this->belongsTo(check_in::class, "id_check_in", "id");
    }
}
