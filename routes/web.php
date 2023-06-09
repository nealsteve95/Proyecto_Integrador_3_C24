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
use App\Http\Controllers\AdminHomeController;

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


// Faltan rutas para los reportes
Route::get('/login',function(){
    return view("login");}
    ) -> name("login");
Route::middleware(['custom.auth'])->group(function () {
    // Rutas para vista de gerente
    Route::get('/gerente/home', function(){ return view('view_gerente/index'); }) -> name('gerente/home')->middleware('check');
    // Podrían ir más rutas para el home

    Route::get('/gerente/huespedes', [HuespedController::class, 'index']) -> name('gerente/huespedes')->middleware('check');;
    Route::get('/gerente/huespedes-show/{id}', [HuespedController::class, 'show'])->name('gerente/huespedes-show')->middleware('check');;

    Route::get('/gerente/habitaciones', [HabitacionController::class, 'index']) -> name('gerente/habitaciones')->middleware('check');;
    Route::get('/gerente/habitaciones-show/{id}', [HabitacionController::class, 'show']) -> name('gerente/habitaciones-show')->middleware('check');;
    Route::get('/gerente/habitaciones-showCreate', function(){ return view('view_gerente/habitaciones/showCreate'); }) -> name('gerente/habitaciones-showCreate')->middleware('check');;
    Route::post('/gerente/habitaciones-create', [HabitacionController::class, 'store']) -> name('gerente/habitaciones-create')->middleware('check');;
    Route::put('/gerente/habitaciones-update/{id}', [HabitacionController::class, 'update']) -> name('gerente/habitaciones-update')->middleware('check');;
    Route::delete('/gerente/habitaciones-delete/{id}', [HabitacionController::class, 'delete'])->name('gerente/habitaciones-delete')->middleware('check');;

    Route::get('/gerente/recepcionistas', [AdministradoresController::class, 'index']) -> name('gerente/recepcionistas')->middleware('check');;
    Route::get('/gerente/recepcionistas-show/{id}', [AdministradoresController::class, 'show']) -> name('gerente/recepcionistas-show')->middleware('check');;
    Route::put('/gerente/recepcionistas-update/{id}', [AdministradoresController::class, 'update']) -> name('gerente/recepcionistas-update')->middleware('check');;
    Route::put('/gerente/recepcionistas-updateUser/{id}', [AdministradoresController::class, 'updateUser']) -> name('gerente/recepcionistas-updateUser')->middleware('check');;
    Route::delete('/gerente/recepcionistas-delete/{id}', [AdministradoresController::class, 'delete']) -> name('gerente/recepcionistas-delete')->middleware('check');;
    Route::get('/gerente/recepcionistas-showCreate', function(){ return view('view_gerente/recepcionistas/showCreate'); }) -> name('gerente/recepcionistas-showCreate')->middleware('check');;
    Route::post('/gerente/recepcionistas-create', [AdministradoresController::class, 'store']) -> name('gerente/recepcionistas-create')->middleware('check');;
    Route::get('/gerente/reportes', function() { return view('view_gerente/reportes/index'); }) -> name('gerente/reportes')->middleware('check');;
    Route::get('/administrador/home',[AdminHomeController::class,'home'])->name('administrador/home')->middleware("check");
});

// Rutas para vista de recepcionista
