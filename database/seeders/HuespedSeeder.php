<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\huesped;
class HuespedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $datahuesped = [
        [
            "id_huesped" => "67432324",
            "tipo_identificacion" => "DNI",
            "nombres" => "Juan",
            "apellidos" => "Pérez",
            "sexo" => "Masculino",
            "fecha_nacimiento" => "1990-05-10",
            "nacionalidad" => "Peruana",
            "region_direccion" => "Lima",
            "telefono" => "987654321",
            "correo" => "juan.perez@example.com",
            "id_empresa" => [
                [
                    "RUC" => "20123456789",
                    "razon_social" => "Hotel Estrella",
                    "direccion_empresa" => "Avenida Principal 123",
                ]
            ],
        ],
        [
            "id_huesped" => "78943238",
            "tipo_identificacion" => "DNI",
            "nombres" => "María",
            "apellidos" => "García",
            "sexo" => "Femenino",
            "fecha_nacimiento" => "1988-09-15",
            "nacionalidad" => "Peruana",
            "region_direccion" => "Arequipa",
            "telefono" => "987123456",
            "correo" => "maria.garcia@example.com",
            "id_empresa" => [
                [
                    "RUC" => "",
                    "razon_social" => "",
                    "direccion_empresa" => "",
                ]
            ],
        ],
        [
            "id_huesped" => "04628382",
            "tipo_identificacion" => "DNI",
            "nombres" => "Pedro",
            "apellidos" => "López",
            "sexo" => "Masculino",
            "fecha_nacimiento" => "1995-12-20",
            "nacionalidad" => "Peruana",
            "region_direccion" => "Cusco",
            "telefono" => "987987654",
            "correo" => "pedro.lopez@example.com",
            "id_empresa" => [
                [
                    "RUC" => "20234567890",
                    "razon_social" => "Hotel Luna",
                    "direccion_empresa" => "Calle Secundaria 456",
                ]
            ],
        ],
        [
            "id_huesped" => "11129123",
            "tipo_identificacion" => "CE",
            "nombres" => "Luis",
            "apellidos" => "González",
            "sexo" => "Masculino",
            "fecha_nacimiento" => "1985-03-25",
            "nacionalidad" => "Peruana",
            "region_direccion" => "Trujillo",
            "telefono" => "987345678",
            "correo" => "luis.gonzalez@example.com",
            "id_empresa" => [
                [
                    "RUC" => "20234567890",
                    "razon_social" => "Hotel Luna",
                    "direccion_empresa" => "Calle Secundaria 456",
                ]
            ],
        ],
        [
            "id_huesped" => "27347132",
            "tipo_identificacion" => "DNI",
            "nombres" => "Ana",
            "apellidos" => "Ramírez",
            "sexo" => "Femenino",
            "fecha_nacimiento" => "1992-07-12",
            "nacionalidad" => "Peruana",
            "region_direccion" => "Lima",
            "telefono" => "987567890",
            "correo" => "ana.ramirez@example.com",
            "id_empresa" => [
                [
                    "RUC" => "",
                    "razon_social" => "",
                    "direccion_empresa" => "",
                ],
            ],
        ],
    ];
        huesped::insert($datahuesped);
    }
}
