<?php

namespace Database\Seeders;

use App\Models\Habitacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* Habitacion::create([

        ]); */
        $datahabitacion = [
            [
                "nro_habitacion" => 201,
                "nro_piso" => "2",
                "tipo_habitacion" => "Doble Estándar",
                "precio" => 160.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 202,
                "nro_piso" => "2",
                "tipo_habitacion" => "Individual",
                "precio" => 140.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 203,
                "nro_piso" => "2",
                "tipo_habitacion" => "Individual",
                "precio" => 140.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
             [
                 "nro_habitacion" => 204,
                 "nro_piso" => "2",
                 "tipo_habitacion" => "Individual",
                 "precio" => 140.00,
                 "estado" => "Libre",
                 "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                 "cant_reservas" => [
                     ""
                 ],
                 "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
             ],
             [
                 "nro_habitacion" => 205,
                 "nro_piso" => "2",
                 "tipo_habitacion" => "Individual",
                 "precio" => 140.00,
                 "estado" => "Libre",
                 "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 206,
                "nro_piso" => "2",
                "tipo_habitacion" => "Individual",
                "precio" => 140.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 301,
                "nro_piso" => "3",
                "tipo_habitacion" => "Doble",
                "precio" => 240.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 302,
                "nro_piso" => "3",
                "tipo_habitacion" => "Doble Superior",
                "precio" => 180.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 303,
                "nro_piso" => "3",
                "tipo_habitacion" => "Suite Queen",
                "precio" => 280.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, Jacuzzi",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 304,
                "nro_piso" => "3",
                "tipo_habitacion" => "Doble Estándar",
                "precio" => 160.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 305,
                "nro_piso" => "3",
                "tipo_habitacion" => "Triple",
                "precio" => 320.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 3 Camas",
                "cant_reservas" => [
                    "B1"
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 401,
                "nro_piso" => "4",
                "tipo_habitacion" => "Suite King",
                "precio" => 330.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, Jacuzzi, Cama King",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 402,
                "nro_piso" => "4",
                "tipo_habitacion" => "Doble Superior",
                "precio" => 180.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 403,
                "nro_piso" => "4",
                "tipo_habitacion" => "Doble Superior",
                "precio" => 180.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 404,
                "nro_piso" => "4",
                "tipo_habitacion" => "Suite Queen",
                "precio" => 280.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, Jacuzzi, Cama Queen",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 405,
                "nro_piso" => "4",
                "tipo_habitacion" => "Doble Estándar",
                "precio" => 160.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 406,
                "nro_piso" => "4",
                "tipo_habitacion" => "Triple",
                "precio" => 320.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 3 Camas",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 501,
                "nro_piso" => "5",
                "tipo_habitacion" => "Suite Queen",
                "precio" => 280.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, Jacuzzi, Cama Queen",
                "cant_reservas" => [
                    "B2"
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 502,
                "nro_piso" => "5",
                "tipo_habitacion" => "Individual",
                "precio" => 140.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 503,
                "nro_piso" => "5",
                "tipo_habitacion" => "Individual",
                "precio" => 140.00,
                "estado" => "Libre",
                "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                "cant_reservas" => [
                    ""
                ],
                "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
            ],
            [
                "nro_habitacion" => 504,
                "nro_piso" => "5",
                "tipo_habitacion" => "Individual",
                 "precio" => 140.00,
                 "estado" => "Libre",
                 "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                 "cant_reservas" => [
                     ""
                 ],
                 "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
             ],
             [
                 "nro_habitacion" => 505,
                 "nro_piso" => "5",
                 "tipo_habitacion" => "Individual",
                 "precio" => 140.00,
                 "estado" => "Libre",
                 "caracteristicas" => "Televisión, Baño privado, 1 Cama",
                 "cant_reservas" => [
                     ""
                 ],
                 "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
             ],
             [
                 "nro_habitacion" => 506,
                 "nro_piso" => "5",
                 "tipo_habitacion" => "Doble",
                 "precio" => 240.00,
                 "estado" => "Libre",
                 "caracteristicas" => "Televisión, Baño privado, 2 Camas",
                 "cant_reservas" => [
                     ""
                 ],
                 "imagen"=>"https://image-tc.galaxy.tf/wijpeg-axw5v17qr09qa28z5mfpaam09/delfines-hotel-peru-lima-accommodation-superior-room-tripadvisor-booking-bed_standard.jpg?crop=67%2C0%2C1067%2C800"
             ],
        ];
        habitacion::insert($datahabitacion);
    }
}
