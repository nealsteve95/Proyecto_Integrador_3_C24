<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicios_y_consumos;
use App\Models\Check_in;

class Servicios_y_consumosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataservicios_y_consumos = [
            [
                "id_check_in" => Check_in::where('id', 1)->value('id'),
                "costo" => 10.00,
                "descripcion" => "4 Gaseosa personales",
                "tipo" => "consumo",
            ],
            [
                "id_check_in" => Check_in::where('id', 5)->value('id'),
                "costo" => 15.00,
                "descripcion" => "Bebidas energisantes",
                "tipo" => "consumo",
            ],
            [
                "id_check_in" => Check_in::where('id', 2)->value('id'),
                "costo" => 8.00,
                "descripcion" => "Galletas 6x packs",
                "tipo" => "consumo",
            ],
            [
                "id_check_in" => Check_in::where('id', 1)->value('id'),
                "costo" => 100.00,
                "descripcion" => "Servicio de decoración de habitación aniversario",
                "tipo" => "servicio",
            ],
            [
                "id_check_in" => Check_in::where('id', 2)->value('id'),
                "costo" => 80.00,
                "descripcion" => "Sorpresa de cumpleaños",
                "tipo" => "servicio",
            ],
            [
                "id_check_in" => Check_in::where('id', 5)->value('id'),
                "costo" => 120.00,
                "descripcion" => "Atención especial al cuarto con temática de vaqueros",
                "tipo" => "servicio",
            ],
            [
                "id_check_in" => Check_in::where('id', 3)->value('id'),
                "costo" => 25.00,
                "descripcion" => "4 gaseosas personales, 3 galletas oreos, 2 cigarrillos",
                "tipo" => "consumo",
            ],
        ];
        
        Servicios_y_consumos::insert($dataservicios_y_consumos);
    }
}
