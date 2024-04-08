<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function create()
    {
        return view('vehiculo.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|max:255|unique:vehiculos',
            'tipo' => 'required|in:furgoneta,camion',
        ],
        [
            'matricula.required' => 'La matricula es obligatoria',
        ]);

        $vehiculo = new Vehiculo();
        $vehiculo->matricula = $request->matricula;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->save();

        return redirect()->route('vehiculo.create')->with('success', 'Vehículo creado correctamente.');
    }
}