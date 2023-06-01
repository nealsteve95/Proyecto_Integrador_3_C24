<?php

use Illuminate\Support\Facades\Route;

// Controladores (no tocar)
use App\Http\Controllers\HuespedController;
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
Route::put('/gerente/habitaciones-update/{id}', [HabitacionController::class, 'update']) -> name('gerente/habitaciones-update');

Route::get('/gerente/recepcionistas', [AdministradoresController::class, 'index']) -> name('gerente/recepcionistas');
Route::get('/gerente/recepcionistas-show/{id}', [AdministradoresController::class, 'show']) -> name('gerente/recepcionistas-show');
Route::put('/gerente/recepcionistas-update/{id}', [AdministradoresController::class, 'update']) -> name('gerente/recepcionistas-update');
Route::delete('/gerente/recepcionistas-delete/{id}', [AdministradoresController::class, 'delete']) -> name('gerente/recepcionistas-delete');
Route::get('/gerente/recepcionistas-showCreate', function(){ return view('view_gerente/recepcionistas/showCreate'); }) -> name('gerente/recepcionistas-showCreate');
Route::post('/gerente/recepcionistas-create/{id}', [AdministradoresController::class, 'create']) -> name('gerente/recepcionistas-create');

// Faltan rutas para los reportes
Route::get('/gerente/reportes', function() { return view('view_gerente/reportes/index'); }) -> name('gerente/reportes');

// Rutas para vista de recepcionista
