<?php

use App\Http\Controllers\AdminCheckController;
use Illuminate\Support\Facades\Route;

// Controladores (no tocar)
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\AdministradoresController;
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
Route::get('/',function(){return redirect()->route("login");});

//Ruta para el login
Route::get('/login',[LoginController::class,"mostrarLogin"]) -> name("login");

//Ruta para procesar el login
Route::post('/login',[LoginController::class,"checkLogin"]) -> name("checkLogin");

//Vistas protegidas por el middleware de autenticacion de usuario
Route::middleware(['custom.auth'])->group(function(){
    
    //---------VISTAS DE GERENTE------------//
    Route::get('/gerente/home', function(){ return view('view_gerente/index'); }) -> name('gerente/home')->middleware("check");
    
    Route::get('/gerente/huespedes', [HuespedController::class, 'index']) -> name('gerente/huespedes')->middleware("check");
    Route::get('/gerente/huespedes-show/{id}', [HuespedController::class, 'show'])->name('gerente/huespedes-show')->middleware("check");
    
    Route::get('/gerente/habitaciones', [HabitacionController::class, 'index']) -> name('gerente/habitaciones')->middleware("check");
    Route::get('/gerente/habitaciones-show/{id}', [HabitacionController::class, 'show']) -> name('gerente/habitaciones-show')->middleware("check");
    Route::get('/gerente/habitaciones-showCreate', function(){ return view('view_gerente/habitaciones/showCreate'); }) -> name('gerente/habitaciones-showCreate')->middleware("check");
    Route::post('/gerente/habitaciones-create', [HabitacionController::class, 'store']) -> name('gerente/habitaciones-create')->middleware("check");
    Route::put('/gerente/habitaciones-update/{id}', [HabitacionController::class, 'update']) -> name('gerente/habitaciones-update')->middleware("check");
    Route::delete('/gerente/habitaciones-delete/{id}', [HabitacionController::class, 'delete'])->name('gerente/habitaciones-delete')->middleware("check");
    
    Route::get('/gerente/recepcionistas', [AdministradoresController::class, 'index']) -> name('gerente/recepcionistas')->middleware("check");
    Route::get('/gerente/recepcionistas-show/{id}', [AdministradoresController::class, 'show']) -> name('gerente/recepcionistas-show')->middleware("check");
    Route::put('/gerente/recepcionistas-update/{id}', [AdministradoresController::class, 'update']) -> name('gerente/recepcionistas-update')->middleware("check");
    Route::put('/gerente/recepcionistas-updateUser/{id}', [AdministradoresController::class, 'updateUser']) -> name('gerente/recepcionistas-updateUser')->middleware("check");
    Route::delete('/gerente/recepcionistas-delete/{id}', [AdministradoresController::class, 'delete']) -> name('gerente/recepcionistas-delete')->middleware("check");
    Route::get('/gerente/recepcionistas-showCreate', function(){ return view('view_gerente/recepcionistas/showCreate'); }) -> name('gerente/recepcionistas-showCreate')->middleware("check");
    Route::post('/gerente/recepcionistas-create', [AdministradoresController::class, 'store']) -> name('gerente/recepcionistas-create')->middleware("check");
    
    // Faltan rutas para los reportes
    Route::get('/gerente/reportes', function() { return view('view_gerente/reportes/index'); }) -> name('gerente/reportes')->middleware("check");
    
    

    //-----------------VISTAS PARA ADMINISTRADOR---------------------//

    Route::get('/administrador/home',function(){return view('view_recepcionista/indexrecep');}) -> name('administrador/home')->middleware("check");
    Route::get('/administrador/huespedes',function(){$huespedes=[];return view('view_recepcionista/huespedes/index',["huespedes"=>$huespedes]);}) -> name('administrador/huespedes')->middleware("check");
    Route::get('/administrador/habitaciones',function(){$habitaciones=[];return view('view_recepcionista/habitaciones/index',["habitaciones"=>$habitaciones]);}) -> name('administrador/habitaciones')->middleware("check");
    Route::get('/administrador/reportes',function(){return view('view_recepcionista/reportes/report');}) -> name('administrador/reportes')->middleware("check");
    Route::get('/administrador/check',[AdminCheckController::class, 'index']) -> name('administrador/check')->middleware("check");
    Route::post('/administrador/check',[AdminCheckController::class, 'create']) -> name('administrador/checkC')->middleware("check");
    Route::post('/administrador/checkout',[AdminCheckController::class, 'create2']) -> name('administrador/checkC')->middleware("check");
    Route::get('/administrador/cochera',function(){return view('view_recepcionista/cochera/index');}) -> name('administrador/cochera')->middleware("check");
    Route::get('/administrador/logout',function(){return route('api/logout');}) -> name('administrador/logout');
    
    // Ruta para mostrar todas las reservas
    Route::get('/administrador/reservas', [ReservaController::class, 'index']) -> name('administrador/reservas')->middleware("check"); 
    Route::get('/administrador/reservas-show/{id}', [ReservaController::class, 'show']) -> name('administrador/reservas-show')->middleware("check");
    Route::get('/administrador/reservas-showCreate', function(){ return view('view_recepcionista/reservas/showCreate'); }) -> name('administrador/reservas-showCreate')->middleware("check");
    // Ruta para borrar los datos
    Route::delete('/administrador/reservas-delete/{id}', [ReservaController::class, 'delete']) -> name('administrador/reservas-delete')->middleware("check");

});