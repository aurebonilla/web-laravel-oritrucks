<?php

use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;

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

Route::get('/sign-in', function () {
    return view('static-sign-in');
});

// Rutas de Viaje
Route::resource('viaje', ViajeController::class);
Route::delete('/viaje/identificador/{identificador}', [ViajeController::class, 'destroyByIdentificador']);
Route::get('/viaje/edit/{identificador}', [ViajeController::class, 'edit']);
Route::get('/signup', [SignUpController::class, 'create'])->name('cliente.create');

Route::post('/signup', [SignUpController::class, 'store'])->name('cliente.store');
