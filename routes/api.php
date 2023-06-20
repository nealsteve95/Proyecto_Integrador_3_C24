<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//----ESQUEMA DE ROLES----//

//End point para registrar Administradores
Route::post("/register", [ApiController::class, "register"])->name("/register");
//End point para autenticar al usuario
Route::post("/login", [ApiController::class, "login"]);
//End point para deslogear al usuario
Route::get("/logout", [ApiController::class, "logout"]);
//End point para autenticar solicitudes
Route::post("/auth", [ApiController::class, "checkAuth"]);
//End point para autenticar roles
Route::post("/auth/role", [ApiController::class, "checkAuthRole"]);


//----END POINTS PARA CONSUMO----//

//End point para registrar reservas
Route::post("/reserva", [ApiController::class, "storeReservas"]);
//End point para ver Reservas
Route::get("/reserva", [ApiController::class, "listReservas"]);
//End point para registrar CheckIn
Route::post("/checkin", [ApiController::class, "storeCheckIn"]);
//End point para listar CheckIn
Route::get("/checkin", [ApiController::class, "listCheckIn"]);
//End point para registrar CheckOut
Route::post("/checkout", [ApiController::class, "storeCheckOut"]);
//End point para listar CheckOut
Route::get("/checkout", [ApiController::class, "listCheckOut"]);
//End point para listar CheckOut
Route::get("/habitaciones", [ApiController::class, "listHabitaciones"]);
//ENd point para obtener habitacion.
Route::get("/habitacion", [ApiController::class, "getHabitacion"]);
//End point para actualizar una habitacion (no actualiza la imagen).
Route::put("/habitaciones/{id}", [ApiController::class, "actualizarHabitaciones"]);

//End point para tener las credenciales de un usuario autenticado
Route::get("/auth/info", [ApiController::class, "getUser"]);
//End point para obtener huesped con dni
Route::get("/huesped", [ApiController::class, "getHuesped"]);
//End point para obtener huesped con dni
Route::post("/huesped", [ApiController::class, "createHuesped"]);
// End point para obtener todos los huespedes.
Route::get("/huespedes", [ApiController::class, "listarHuespedes"]);
// End point para actualizar un huesped especificado.
Route::put("/huespedes/{id}", [ApiController::class, "actualizarHuespedes"]);
// End point para actualizar una empresa especificado.
Route::put("/huespedesEmpresa/{id}", [ApiController::class, "actualizarEmpresa"]);
// End point para eliminar un huesped especificado.
Route::delete('/huespedes/{id}', [ApiController::class, "eliminarHuesped"]);
