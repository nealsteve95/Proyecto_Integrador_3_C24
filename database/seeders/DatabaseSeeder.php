<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // se insertan todos los seeder creados para ser llamados por php migrate db:seeed
            HuespedSeeder::class,
            HabitacionSeeder::class,
            AdministradorSeeder::class,
            Check_inSeeder::class,
            CocheraSeeder::class,
            Servicios_y_consumosSeeder::class,
            Check_outSeeder::class
        ]);
    }
}
