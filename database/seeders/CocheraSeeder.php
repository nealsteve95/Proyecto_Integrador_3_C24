<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cochera;
use App\Models\Check_in;
use App\Models\Huesped;

class CocheraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datacochera = [
            [
                "id_huesped" => 67432324,//Huesped::where('id_huesped', '78943238')->value('id_huesped'),
                "placa" => "ABC-123",
                "color" => "Negro",
                "modelo" => "Sedán",
            ],
            // [
            //     "id_huesped" => Huesped::where('id_huesped', '27347132')->value('id_huesped'),
            //     "placa" => "DEF-456",
            //     "color" => "Blanco",
            //     "modelo" => "SUV",
            // ],
            // [
            //     "id_huesped" => Huesped::where('id_huesped', '11129123')->value('id_huesped'),
            //     "placa" => "GHI-789",
            //     "color" => "Rojo",
            //     "modelo" => "Hatchback",
            // ],
        ];
        
        Cochera::insert($datacochera);
    }
}
