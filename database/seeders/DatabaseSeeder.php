<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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
