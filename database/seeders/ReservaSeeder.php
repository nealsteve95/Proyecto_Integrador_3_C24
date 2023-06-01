<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\reserva;

class ReservaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datareserva = [
            [
                "id" => 1,
                'id_huesped' => 67432324,
                'fecha_reserva' => "2023-06-01",
                'cant_dias'=> 2,
                'nro_acompañantes' => 2,
                // 'nro_habitaciones' => [
                //     201,
                //     305
                // ]
            ],
            [
                "id" => 2,
                'id_huesped' => 67432324,
                'fecha_reserva' => "2023-06-05",
                'cant_dias'=> 5,
                'nro_acompañantes' => 1, 
                // 'nro_habitaciones' => [ 
                //     201,
                //     501
                // ] 
            ]
        ];
        
        reserva::insert($datareserva);

    }
}
