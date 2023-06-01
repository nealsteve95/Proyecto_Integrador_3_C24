<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use App\Models\Huesped;
use App\Models\Habitacion;
use App\Models\Cochera;
use App\Models\Check_in;
use App\Models\Servicios_y_consumos;
use App\Models\Reserva;
use App\Models\Administrador;
use App\Models\Check_out;
use App\Http\Controllers\UsuariosController;
use App\Models\Reserva_habitacion;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// huesped 1:1 cochera >>>>

// Route::get('/', function () {
//     return huesped::with('cochera')->get();
// });

// huesped 1:N reserva >>>>

// Route::get('/', function () {
//     return huesped::with('reserva')->get();
// });

// reserva N:N habitacion >>>>


 Route::get('/', function () {
     return Reserva_habitacion::with('reserva')->get();
 });

//  Route::get('/', function () {
//     return Reserva_habitacion::with('habitacion')->get();
// });


// check-in 1:1 reserva >>>>
//  Route::get('/', function () {
//      return check_in::with('reserva')->get();
//  });



// check-in 1:N s_y_C >>>>

//  Route::get('/', function () {
//      return Servicios_y_consumos::with('check_in')->get();
//  });

// check-in 1:1 check_out >>>>

// Route::get('/', function () {
//     return Check_out::with('check_in')->get();
// });

// check_in o checkout N:1 administrador

// Route::get('/', function () {
//     return Check_out::with('administrador')->get();
// });

// check_in 1:1 check_out
// Route::get('/', function () {
//     return check_out::with('check_in')->get();
// });