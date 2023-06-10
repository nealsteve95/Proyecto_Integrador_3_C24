<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HabitacionesApiController;
use App\Http\Controllers\ReservaController;

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
Route::post("/register",[AuthController::class,"register" ])->name("/register");
Route::post("/login",[AuthController::class,"login" ]);
Route::post("/reserva",[ReservaController::class,"store" ]);
Route::get("/reserva",[ReservaController::class,"index" ])->name('reserva');
Route::get("/habitaciones",[HabitacionesApiController::class,"index" ]);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function(){

    Route::get("/logout",[AuthController::class,"logout"]);

});
