<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\VehiculoController;

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
    return view('index');
});

Route::get('/signup', [SignUpController::class, 'create'])->name('cliente.create');

Route::post('/signup', [SignUpController::class, 'store'])->name('cliente.store');

//rutas vehiculos


Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculo.create');
Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculo.store');
