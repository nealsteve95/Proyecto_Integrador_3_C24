<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;
class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataadministrador = [
            [
                "id" => 101,
                "nombres" => "María",
                "apellidos" => "García",
                "turno" => "Mañana",
                "telefono_celular" => "987654321",
                "correo_electronico"=>"garcia@gmail.com",
                "DNI"=>"91730011",
                "nombre_usuario"=>"mariGa",
                "contraseña"=>"gg777",
                "permisos"=>"recepcionista",
            ],
            [
                "id" => 102,
                "nombres" => "Juan",
                "apellidos" => "López",
                "turno" => "Tarde",
                "telefono_celular" => "987654322",
                "correo_electronico"=>"lopez@gmail.com",
                "DNI"=>"60018220",
                "contraseña"=>"juanesconaceite",
                "permisos"=>"recepcionista",
            ],
            [
                "id" => 103,
                "nombres" => "Luis",
                "apellidos" => "Martínez",
                "turno" => "Noche",
                "telefono_celular" => "987654323",
                "correo_electronico"=>"martinez@gmail.com",
                "DNI"=>"53671212",
                "contraseña"=>"freeheorico",
                "permisos"=>"recepcionista",
            ],
            [
                "id" => 104,
                "nombres" => "Ana",
                "apellidos" => "Ramírez",
                "turno" => "Domingos",
                "telefono_celular" => "987654324",
                "correo_electronico"=>"ramirez@gmail.com",
                "DNI"=>"02414211",
                "contraseña"=>"gime777",
                "permisos"=>"recepcionista",
            ],
        ];
        
        administrador::insert($dataadministrador);

    }
}
