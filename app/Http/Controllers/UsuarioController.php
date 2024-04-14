<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{
    public function show($dni)
{
    $usuario = Usuario::where('dni', $dni)->first();

    if (!$usuario) {
        return back()->with('error', 'No existe el usuario con el DNI proporcionado');
    }

    return view('usuario.inicio', compact('usuario'));
}
}