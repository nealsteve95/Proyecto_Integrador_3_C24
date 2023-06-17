<?php

use App\Http\Controllers\AdminCheckController;
use App\Http\Controllers\AdminHabitacionController;
use App\Http\Controllers\AdminHuespedController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GerenteHabitacionController;
use App\Http\Controllers\GerenteHuespedController;

// Controladores (no tocar)
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\AdminReservaController;
use App\Http\Controllers\LoginController;
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


//Ruta index para que redirija al login
Route::get('/', function () {
    return redirect()->route("login");
});

//Ruta para el login
Route::get('/login', [LoginController::class, "mostrarLogin"])->name("login");

//Ruta para procesar el login
Route::post('/login', [LoginController::class, "checkLogin"])->name("checkLogin");

//Vistas protegidas por el middleware de autenticacion de usuario
Route::middleware(['custom.auth'])->group(function () {

    //---------VISTAS DE GERENTE------------//
    Route::get('/gerente/home', function () {
        return view('view_gerente/index');
    })->name('gerente/home')->middleware("check");

    Route::get('/gerente/huespedes', [GerenteHuespedController::class, 'index'])->name('gerente/huespedes')->middleware("check");
    Route::get('/gerente/huespedes-show/{id}', [GerenteHuespedController::class, 'show'])->name('gerente/huespedes-show')->middleware("check");

    Route::get('/gerente/habitaciones', [GerenteHabitacionController::class, 'index'])->name('gerente/habitaciones')->middleware("check");
    Route::get('/gerente/habitaciones-show/{id}', [HabitacionController::class, 'show'])->name('gerente/habitaciones-show')->middleware("check");
    Route::get('/gerente/habitaciones-showCreate', function () {
        return view('view_gerente/habitaciones/showCreate');
    })->name('gerente/habitaciones-showCreate')->middleware("check");
    Route::post('/gerente/habitaciones-create', [HabitacionController::class, 'store'])->name('gerente/habitaciones-create')->middleware("check");
    Route::put('/gerente/habitaciones-update/{id}', [HabitacionController::class, 'update'])->name('gerente/habitaciones-update')->middleware("check");
    Route::delete('/gerente/habitaciones-delete/{id}', [HabitacionController::class, 'delete'])->name('gerente/habitaciones-delete')->middleware("check");

    Route::get('/gerente/recepcionistas', [AdministradoresController::class, 'index'])->name('gerente/recepcionistas')->middleware("check");
    Route::get('/gerente/recepcionistas-show/{id}', [AdministradoresController::class, 'show'])->name('gerente/recepcionistas-show')->middleware("check");
    Route::put('/gerente/recepcionistas-update/{id}', [AdministradoresController::class, 'update'])->name('gerente/recepcionistas-update')->middleware("check");
    Route::put('/gerente/recepcionistas-updateUser/{id}', [AdministradoresController::class, 'updateUser'])->name('gerente/recepcionistas-updateUser')->middleware("check");
    Route::delete('/gerente/recepcionistas-delete/{id}', [AdministradoresController::class, 'delete'])->name('gerente/recepcionistas-delete')->middleware("check");
    Route::get('/gerente/recepcionistas-showCreate', function () {
        return view('view_gerente/recepcionistas/showCreate');
    })->name('gerente/recepcionistas-showCreate')->middleware("check");
    Route::post('/gerente/recepcionistas-create', [AdministradoresController::class, 'store'])->name('gerente/recepcionistas-create')->middleware("check");

    // Faltan rutas para los reportes
    Route::get('/gerente/reportes', function () {
        return view('view_gerente/reportes/index');
    })->name('gerente/reportes')->middleware("check");



    //-----------------VISTAS PARA ADMINISTRADOR---------------------//

    Route::get('/administrador/home', function () {
        return view('view_recepcionista/indexrecep');
    })->name('administrador/home')->middleware("check");

    Route::get('/administrador/huespedes', [AdminHuespedController::class, "index"])->name('administrador/huespedes')->middleware("check");
    Route::get('/administrador/createHuesped', [AdminHuespedController::class, "createHuesped"])->name('administrador/createHuesped')->middleware("check");
    Route::post('/administrador/storeHuesped', [AdminHuespedController::class, "storeHuesped"])->name('/administrador/storeHuesped')->middleware("check");
    Route::get('/administrador/huespedes-show/{id}', [AdminHuespedController::class, "show"])->name('administrador/huespedes-show')->middleware("check");
    Route::put('/administrador/huespedes-update/{id}', [AdminHuespedController::class, "update"])->name('administrador/huespedes-update')->middleware("check");
    Route::put('/administrador/huespedes-updateEmpresa/{id}', [AdminHuespedController::class, "updateEmpresa"])->name('administrador/huespedes-updateEmpresa')->middleware("check");


    Route::get('/administrador/habitaciones', [AdminHabitacionController::class, "index"])->name("administrador/habitaciones")->middleware("check");
    Route::get('/administrador/habitaciones-show/{id}', [AdminHabitacionController::class, "show"])->name("administrador/habitaciones-show")->middleware("check");
    Route::put('/administrador/habitaciones-update/{id}', [AdminHabitacionController::class, "update"])->name("administrador/habitaciones-update")->middleware("check");

    Route::get('/administrador/reportes', function () {
        return view('view_recepcionista/reportes/report');
    })->name('administrador/reportes')->middleware("check");

    Route::get('/administrador/check', [AdminCheckController::class, 'mostrarCheck'])->name('administrador/check')->middleware("check");
    Route::post('/administrador/confirmarCheckIn', [AdminCheckController::class, 'confirmarCheckIn'])->name('administrador/confirmarCheckIn')->middleware("check");
    Route::post('/administrador/generarCheckIn', [AdminCheckController::class, 'generarCheckIn'])->name('administrador/generarCheckIn')->middleware("check");
    Route::post('/administrador/confirmarCheckOut', [AdminCheckController::class, 'confirmarCheckOut'])->name('administrador/confirmarCheckOut')->middleware("check");
    Route::post('/administrador/generarCheckOut', [AdminCheckController::class, 'generarCheckOut'])->name('administrador/generarCheckOut')->middleware("check");

    Route::get('/administrador/cochera', function () {
        return view('view_recepcionista/cochera/index');
    })->name('administrador/cochera')->middleware("check");
    Route::get('/administrador/logout', function () {
        return route('api/logout');
    })->name('administrador/logout');

    // Ruta para mostrar todas las reservas
    Route::get('/administrador/createReserva', [AdminReservaController::class, 'createReserva'])->name('administrador/createReserva')->middleware("check");
    Route::get('/administrador/reservas', [AdminReservaController::class, 'mostrarReservas'])->name('administrador/reservas')->middleware("check");
    Route::post('/administrador/verificarIdentidad', [AdminReservaController::class, 'verificarIdentidad'])->name('administrador/verificarIdentidad')->middleware("check");
    Route::post('/administrador/realizarReserva', [AdminReservaController::class, 'realizarReserva'])->name('/administrador/realizarReserva')->middleware("check");
});
Route::get('/logout', [LoginController::class, "logout"])->name('/logout');
