<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\check_in;
use App\Models\habitacion;
use App\Models\huesped;
use App\Models\administrador;

class Check_inSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datacheck_in = [
            [
                "id" => 1,
                "id_reserva" => 1,//Huesped::where('id_huesped', '67432324')->value('id_huesped'),
                "id_administrador" => 101,//Administrador::where('id', 102)->value('id'),
                "tipo_reserva" => "Via Telefono",
                "paxs" => 2,
                "cant_dias" => 3,
                "motivo_viaje" => "Turismo",
                "fecha_ingreso" => "2023-05-17",
                "hora_ingreso" => "20:30:00",
                "nota_adicional" => "Ninguna",
            ]
            // [
            //     "id" => 2,
            //     "id_huesped" => Huesped::where('id_huesped', '78943238')->value('id_huesped'),
            //     "nro_habitacion" => Habitacion::where('nro_habitacion', '202')->value('nro_habitacion'),
            //     "id_recepcionista" => Administrador::where('id', 102)->value('id'),
            //     "tipo_reserva" => "Via Booking",
            //     "paxs" => 1,
            //     "cant_dias" => 2,
            //     "motivo_viaje" => "Negocios",
            //     "fecha_ingreso" => "2023-05-18",
            //     "nota_adicional" => "Ninguna",
            // ],
            // [
            //     "id" => 3,
            //     "id_huesped" => Huesped::where('id_huesped', '04628382')->value('id_huesped'),
            //     "nro_habitacion" => Habitacion::where('nro_habitacion', '505')->value('nro_habitacion'),
            //     "id_recepcionista" => Administrador::where('id', 104)->value('id'),
            //     "tipo_reserva" => "Via Whatsapp",
            //     "paxs" => 3,
            //     "cant_dias" => 4,
            //     "motivo_viaje" => "Vacaciones",
            //     "fecha_ingreso" => "2023-05-19",
            //     "nota_adicional" => "Ninguna",
            // ],
            // [
            //     "id" => 4,
            //     "id_huesped" => Huesped::where('id_huesped', '11129123')->value('id_huesped'),
            //     "nro_habitacion" => Habitacion::where('nro_habitacion', '402')->value('nro_habitacion'),
            //     "id_recepcionista" => Administrador::where('id', 102)->value('id'),
            //     "tipo_reserva" => "Via Pagina Web",
            //     "paxs" => 1,
            //     "cant_dias" => 1,
            //     "motivo_viaje" => "Turismo",
            //     "fecha_ingreso" => "2023-05-20",
            //     "nota_adicional" => "Ninguna",
            // ],
            // [
            //     "id" => 5,
            //     "id_huesped" => Huesped::where('id_huesped', '27347132')->value('id_huesped'),
            //     "nro_habitacion" => Habitacion::where('nro_habitacion', '401')->value('nro_habitacion'),
            //     "id_recepcionista" => Administrador::where('id', 104)->value('id'),
            //     "tipo_reserva" => "Via Presencial",
            //     "paxs" => 2,
            //     "cant_dias" => 5,
            //     "motivo_viaje" => "Turismo",
            //     "fecha_ingreso" => "2023-05-21",
            //     "nota_adicional" => "Ninguna",
            // ],
        ];
        
        check_in::insert($datacheck_in);
    }
}
