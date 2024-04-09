<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdministradorUsuariosController;

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