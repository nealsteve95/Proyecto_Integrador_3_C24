<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HuespedController;
use App\Http\Controllers\HabitacionController;

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

Route::get('/', function () {
    return view('view_gerente/index');
}) -> name('home');

Route::get('/huespedes', [HuespedController::class, 'index']) -> name('huespedes');
Route::get('/huespedes-show/{id}', [HuespedController::class, 'show'])->name('huespedes-show');
Route::delete('/huespedes-delete/{id}', [HuespedController::class, 'delete']) -> name('huespedes-delete');

Route::get('/habitaciones', [HabitacionController::class, 'index']) -> name('habitaciones');
Route::get('/habitaciones-show/{id}', [HabitacionController::class, 'show']) -> name('habitaciones-show');
Route::delete('/habitaciones-delete/{id}', [HabitacionController::class, 'delete']) -> name('habitaciones-delete');
Route::post('/habitaciones-insert', [HabitacionController::class, 'store']) -> name('habitaciones-insert');
Route::put('/habitaciones-update/{id}', [HabitacionController::class, 'update']) -> name('habitaciones-update');

Route::get('/reservas', function () {
    return view('view_gerente/reservas/index');
}) -> name('reservas');
Route::get('/checkins', function () {
    return view('view_gerente/checkin');
}) -> name('checkins');
Route::get('/checkouts', function () {
    return view('view_gerente/checkout');
}) -> name('checkouts');
Route::get('/reportes', function () {
    return view('view_gerente/reportes/report');
}) -> name('reportes');
Route::get('/recepcionistas', function () {
    return view('view_gerente/recep');
}) -> name('recepcionistas');
