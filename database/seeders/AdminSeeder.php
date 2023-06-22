<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Administrador::create([
            'nombres'=>'admin',
            'apellidos'=>'adminLastname',    
            'email'=>'admin@gmail.com',
            'turno'=>'Mañana',
            'telefono'=>'123456789',   
            'password'=>Hash::make('12345678'), 
            'dni'=>'12345678',   
            'rol'=>'admin'    
        ]);

        Administrador::create([
            'name'=>'gerente',    
            'email'=>'gerente@gmail.com',   
            'password'=>Hash::make('12345678'),    
            'rol'=>'gerente' 
        ]);
    }
}
