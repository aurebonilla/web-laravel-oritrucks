<?php

use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;

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
    return file_get_contents(public_path('index.html'));
});

Route::get('/sign-in', function () {
    return view('static-sign-in');
});

// Rutas de Viaje
Route::resource('viaje', ViajeController::class);
Route::delete('/viaje/identificador/{identificador}', [ViajeController::class, 'destroyByIdentificador']);
Route::get('/viaje/edit/{identificador}', [ViajeController::class, 'edit']);