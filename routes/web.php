<?php

use Illuminate\Support\Facades\Route;

// Controladores (no tocar)
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\Huesped_R_Controller;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CocheraController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ServicioController;

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

/**
 * Tipos de peticiones:
 *
 * GET (Obtener info -> Mostrar información de objeto)
 * POST (Enviar info -> Mayormente para crear nuevo objeto)
 * DELETE (Eliminar -> Según cierta info se elimina un objeto)
 * PUT (Reemplazo -> Reemplaza toda la información de un objeto)
 * PATCH (Reemplazo -> Reemplaza información específica de una entidad)
 *
 */

// Rutas para vista de gerente

Route::get('/gerente/home', function(){ return view('view_gerente/index'); }) -> name('gerente/home');
// Podrían ir más rutas para el home

Route::get('/gerente/huespedes', [HuespedController::class, 'index']) -> name('gerente/huespedes');
Route::get('/gerente/huespedes-show/{id}', [HuespedController::class, 'show'])->name('gerente/huespedes-show');

Route::get('/gerente/habitaciones', [HabitacionController::class, 'index']) -> name('gerente/habitaciones');
Route::get('/gerente/habitaciones-show/{id}', [HabitacionController::class, 'show']) -> name('gerente/habitaciones-show');
Route::get('/gerente/habitaciones-showCreate', function(){ return view('view_gerente/habitaciones/showCreate'); }) -> name('gerente/habitaciones-showCreate');
Route::post('/gerente/habitaciones-create', [HabitacionController::class, 'store']) -> name('gerente/habitaciones-create');
Route::put('/gerente/habitaciones-update/{id}', [HabitacionController::class, 'update']) -> name('gerente/habitaciones-update');
Route::delete('/gerente/habitaciones-delete/{id}', [HabitacionController::class, 'delete'])->name('gerente/habitaciones-delete');

Route::get('/gerente/recepcionistas', [AdministradoresController::class, 'index']) -> name('gerente/recepcionistas');
Route::get('/gerente/recepcionistas-show/{id}', [AdministradoresController::class, 'show']) -> name('gerente/recepcionistas-show');
Route::put('/gerente/recepcionistas-update/{id}', [AdministradoresController::class, 'update']) -> name('gerente/recepcionistas-update');
Route::put('/gerente/recepcionistas-updateUser/{id}', [AdministradoresController::class, 'updateUser']) -> name('gerente/recepcionistas-updateUser');
Route::delete('/gerente/recepcionistas-delete/{id}', [AdministradoresController::class, 'delete']) -> name('gerente/recepcionistas-delete');
Route::get('/gerente/recepcionistas-showCreate', function(){ return view('view_gerente/recepcionistas/showCreate'); }) -> name('gerente/recepcionistas-showCreate');
Route::post('/gerente/recepcionistas-create', [AdministradoresController::class, 'store']) -> name('gerente/recepcionistas-create');

// Faltan rutas para los reportes
Route::get('/gerente/reportes', function() { return view('view_gerente/reportes/index'); }) -> name('gerente/reportes');

// Rutas para vista de recepcionista
Route::get('/recepcionista/home', function(){ return view('view_recepcionista/index'); }) -> name('recepcionista/home');

Route::get('/recepcionista/habitaciones', [HabitacionController::class, 'index2']) -> name('recepcionista/habitaciones');
Route::get('/recepcionista/habitaciones-show/{id}', [HabitacionController::class, 'show2']) -> name('recepcionista/habitaciones-show');
Route::put('/recepcionista/habitaciones-update/{id}', [HabitacionController::class, 'update2']) -> name('recepcionista/habitaciones-update');


Route::get('/recepcionista/huespedes', [Huesped_R_Controller::class, 'index']) -> name('recepcionista/huespedes');
Route::get('/recepcionista/huespedes-show/{id}', [Huesped_R_Controller::class, 'show']) -> name('recepcionista/huespedes-show');
Route::put('/recepcionista/huespedes-update/{id}', [Huesped_R_Controller::class, 'update']) -> name('recepcionista/huespedes-update');
Route::put('/recepcionista/huespedes-updateEmpresa/{id}', [Huesped_R_Controller::class, 'updateEmpresa']) -> name('recepcionista/huespedes-updateEmpresa');
Route::delete('/recepcionista/huespedes-delete/{id}', [Huesped_R_Controller::class, 'delete']) -> name('recepcionista/huespedes-delete');
Route::get('/recepcionista/huespedes-showCreate', function(){ return view('view_recepcionista/huespedes/showCreate'); }) -> name('recepcionista/huespedes-showCreate');
Route::post('/recepcionista/huespedes-create', [Huesped_R_Controller::class, 'store']) -> name('recepcionista/huespedes-create');