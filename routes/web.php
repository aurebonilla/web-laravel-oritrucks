<?php

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministradorUsuariosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioClienteController;
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
Route::get('/profile', 'AuthController@showProfile')->name('usuario.profile');
//rutas vehiculos


Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('vehiculo.create')->middleware('admin');
Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('vehiculo.store')->middleware('admin');
Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('vehiculos.index')->middleware('admin');
Route::delete('/vehiculos/{matricula}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy')->middleware('admin');
Route::get('/vehiculos/{matricula}/edit', [VehiculoController::class, 'edit'])->name('vehiculos.edit')->middleware('admin');
Route::put('/vehiculos/{matricula}', [VehiculoController::class, 'update'])->name('vehiculos.update')->middleware('admin');

/*
Route::get('/signup', [SignUpController::class, 'create'])->name('usuario.create');
Route::post('/signup', [SignUpController::class, 'store'])->name('usuario.store');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('usuario.login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('usuario.logout');*/

//Rutas de AdministradorUsuarios
Route::resource('usuarios', AdministradorUsuariosController::class)->middleware('admin');
Route::delete('/usuarios/email/{email}', [AdministradorUsuariosController::class, 'destroyByEmail'])->middleware('admin');
Route::get('/administradorUsuarios', [AdministradorUsuariosController::class, 'index'])->name('administradorUsuarios.index')->middleware('admin');
Route::get('/administradorUsuarios/create', [AdministradorUsuariosController::class, 'create'])->name('administradorUsuarios.create')->middleware('admin');
Route::post('/administradorUsuarios', [AdministradorUsuariosController::class, 'store'])->name('administradorUsuarios.store')->middleware('admin');
Route::get('/administradorUsuarios/edit/{dni}', [AdministradorUsuariosController::class, 'edit'])->name('administradorUsuarios.edit')->middleware('admin');
Route::put('/administradorUsuarios/{dni}', [AdministradorUsuariosController::class, 'update'])->name('administradorUsuarios.update')->middleware('admin');

// Rutas de Conductor
Route::resource('conductor', ConductorController::class)->middleware('admin');
Route::get('/conductor', [ConductorController::class, 'index'])->name('conductor.index')->middleware('admin');
Route::delete('/conductor/email/{email}', [ConductorController::class, 'destroyByEmail'])->middleware('admin');
Route::get('/conductor/edit/{dni}', [ConductorController::class, 'edit'])->middleware('admin');


// Rutas de Viaje
Route::resource('viaje', ViajeController::class)->middleware('admin');
Route::get('/viaje', [ViajeController::class, 'index'])->name('viaje.index')->middleware('admin');
Route::delete('/viaje/identificador/{identificador}', [ViajeController::class, 'destroyByIdentificador'])->middleware('admin');
Route::get('/viaje/edit/{identificador}', [ViajeController::class, 'edit'])->middleware('admin');

// Configuracion Administrador
Route::get('/configuracion', [UsuarioController::class, 'show'])->name('usuario.show');

Auth::routes();

// Rutas de autenticación
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('auth.login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

// Rutas de registro
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('auth.register');


// Rutas de restablecimiento de contraseña
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

//CLIENTE
// Configuracion Cliente
Route::get('/configuracionCliente', [UsuarioClienteController::class, 'show'])->name('usuarioCliente.show');
//Crear viaje Cliente
Route::get('/crearViajeCliente/create', [UsuarioClienteController::class, 'createViaje'])->name('usuarioCliente.createViaje');
Route::get('/crearViajeCliente/store', [UsuarioClienteController::class, 'storeCliente'])->name('usuarioCliente.store');
Route::get('/mostrarViajesCliente', [UsuarioClienteController::class, 'mostrarViajes'])->name('usuarioCliente.mostrarViajes');
//Mostrar todos los vehiculos para Cliente
Route::get('/vehiculosCliente', [UsuarioClienteController::class, 'mostrarVehiculos'])->name('usuarioCliente.mostrarVehiculos');