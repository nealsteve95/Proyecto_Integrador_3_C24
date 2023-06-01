<?php

namespace Database\Seeders;

use App\Models\reserva_habitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Reserva_habitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datareserva_habitacion = [
            [
                "id" => 1,
                'id_reserva' => 1,
                'nro_habitaciones' => 201,
            ],
            [
                "id" => 2,
                'id_reserva' => 2,
                'nro_habitaciones' => 202,
            ]
        ];
        
        reserva_habitacion::insert($datareserva_habitacion);
    }
}
