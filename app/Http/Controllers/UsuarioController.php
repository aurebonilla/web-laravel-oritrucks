<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsuarioController extends Controller
{
    public function show()
    {
        $usuario = auth()->user();

        if (!$usuario) {
            return back()->with('error', 'No hay usuarios disponibles');
        }

        return view('usuario.configuracion', compact('usuario'));
    }
}