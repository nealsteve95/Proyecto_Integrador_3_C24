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
        'name'=>'admin',    
        'email'=>'admin@gmail.com',   
            'password'=>Hash::make('12345678'),    
            'role'=>'admin'    
        ]);

        Administrador::create([
            'name'=>'gerente',    
            'email'=>'gerente@gmail.com',   
            'password'=>Hash::make('12345678'),    
            'role'=>'gerente' 
        ]);
    }
}
