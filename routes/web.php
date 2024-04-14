<?php

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministradorUsuariosController;
use App\Http\Controllers\UsuarioController;
use App\Models\Conductor;

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


//rutas vehiculos


Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculo.create');
Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculo.store');
Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index');
Route::delete('/vehiculos/{matricula}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');
Route::get('/vehiculos/{matricula}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit');
Route::put('/vehiculos/{matricula}', [VehiculoController::class, 'update'])->name('vehiculos.update');


Route::get('/signup', [SignUpController::class, 'create'])->name('usuario.create');
Route::post('/signup', [SignUpController::class, 'store'])->name('usuario.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('usuario.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('usuario.logout');

//Rutas de AdministradorUsuarios
Route::resource('usuarios', AdministradorUsuariosController::class);
Route::delete('/usuarios/email/{email}', [AdministradorUsuariosController::class, 'destroyByEmail']);
Route::get('/administradorUsuarios', [AdministradorUsuariosController::class, 'index'])->name('administradorUsuarios.index');
Route::get('/administradorUsuarios/create', [AdministradorUsuariosController::class, 'create'])->name('administradorUsuarios.create');
Route::post('/administradorUsuarios', [AdministradorUsuariosController::class, 'store'])->name('administradorUsuarios.store');
Route::get('/administradorUsuarios/edit/{dni}', [AdministradorUsuariosController::class, 'edit'])->name('administradorUsuarios.edit');
Route::put('/administradorUsuarios/{dni}', [AdministradorUsuariosController::class, 'update'])->name('administradorUsuarios.update');

// Rutas de Conductor
Route::resource('conductor', ConductorController::class);
Route::get('/conductor', [ConductorController::class, 'index'])->name('conductor.index');
Route::delete('/conductor/email/{email}', [ConductorController::class, 'destroyByEmail']);
Route::get('/conductor/edit/{dni}', [ConductorController::class, 'edit']);
Route::get('/sign-in', function () {
    return view('static-sign-in');
});

// Rutas de Viaje
Route::resource('viaje', ViajeController::class);
Route::get('/viaje', [ViajeController::class, 'index'])->name('viaje.index');
Route::delete('/viaje/identificador/{identificador}', [ViajeController::class, 'destroyByIdentificador']);
Route::get('/viaje/edit/{identificador}', [ViajeController::class, 'edit']);

// Configuracion
Route::get('/inicio/{dni}', [UsuarioController::class, 'show'])->name('usuario.show');
