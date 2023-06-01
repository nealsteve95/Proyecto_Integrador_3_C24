<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Check_out;
use App\Models\Check_in;
use App\Models\Administrador;

class Check_outSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datacheck_out = [
            [
                "id_check_in" => 1,//Check_in::where('id', 1)->value('id'),
                "id_administrador" => 102,//Administrador::where('id', 101)->value('id'),
                "entrega_llaves" => "Sí",
                "forma_pago" => "efectivo",
                "estado_pago" => "cancelado",
                "fecha_salida" => "2023-05-20",
                "hora_salida" => "10:05:20",
                "descripcion_estadia" => "El hospedante tuvo una estadía agradable y cumplió con todas las normas del hotel.",
            ],
            // [
            //     "id_check_in" => Check_in::where('id', 2)->value('id'),
            //     "id_recepcionista" => Administrador::where('id', 101)->value('id'),
            //     "entrega_llaves" => "Sí",
            //     "forma_pago" => "yape",
            //     "estado_pago" => "cancelado",
            //     "fecha_salida" => "2023-05-20",
            //     "descripcion_estadia" => "El hospedante se mostró muy amable y dejó la habitación en excelente estado.",
            // ],
            // [
            //     "id_check_in" => Check_in::where('_id', 3)->value('id'),
            //     "id_recepcionista" => Administrador::where('id', 101)->value('id'),
            //     "entrega_llaves" => "Sí",
            //     "forma_pago" => "izipay",
            //     "estado_pago" => "pendiente",
            //     "fecha_salida" => "2023-05-23",
            //     "descripcion_estadia" => "El hospedante disfrutó de los servicios del hotel y solicitó un servicio de transporte.",
            // ],
            // [
            //     "id_check_in" => Check_in::where('id', 4)->value('id'),
            //     "id_recepcionista" => Administrador::where('id', 104)->value('id'),
            //     "entrega_llaves" => "Sí",
            //     "forma_pago" => "efectivo",
            //     "estado_pago" => "cancelado",
            //     "fecha_salida" => "2023-05-21",
            //     "descripcion_estadia" => "El hospedante realizó varios consumos en la habitación y pagó en efectivo.",
            // ],
            // [
            //     "id_check_in" => Check_in::where('id', 5)->value('id'),
            //     "id_recepcionista" => Administrador::where('id', 104)->value('id'),
            //     "entrega_llaves" => "Sí",
            //     "forma_pago" => "yape",
            //     "estado_pago" => "cancelado",
            //     "fecha_salida" => "2023-05-26",
            //     "descripcion_estadia" => "El hospedante solicitó un servicio de despertador y se retiró temprano.",
            // ],
        ];
        
        Check_out::insert($datacheck_out);
    }
}
