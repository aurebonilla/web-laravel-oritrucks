<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Vehiculo;
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

    public function mostrarVehiculos(Request $request)
    {
        $query = Vehiculo::query();

        if ($request->filled('matricula')) {
            $query->where('matricula', 'like', '%' . $request->matricula . '%');
        }
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
        if ($request->filled('orden') && in_array($request->orden, ['asc', 'desc'])) {
            $query->orderBy('matricula', $request->orden);
        } else {
            $query->orderBy('matricula', 'asc');
        }

        $vehiculos = $query->paginate(5);
        return view('usuarioCliente.mostrarVehiculos', compact('vehiculos'));
    }
}