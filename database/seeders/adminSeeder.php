<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Administrador;
use Illuminate\Support\Facades\Hash;


class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Administrador::create([
            "nombres" => 'gerente',
            "correo" => 'gerente@gmail.com',
            "rol" => 'gerente',
            "contrasena" => Hash::make('12345678')
        ]);
    }
}
