<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioClienteController extends Controller
{
    public function show()
    {
        $usuario = Usuario::first();

        if (!$usuario) {
            return back()->with('error', 'No hay usuarios disponibles');
        }

        return view('usuarioCliente.configuracion', compact('usuario'));
    }
}