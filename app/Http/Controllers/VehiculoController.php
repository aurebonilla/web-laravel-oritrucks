<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    //Mostramos la vista para completar los campos y añadir el vehiculo a la base de datos
    public function create()
    {
        return view('vehiculo.create');
    }

    //Hacemos el input en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => 'required|max:255|unique:vehiculos', //Nos aseguramos de que no existe otra matricula igual en la base de datos
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

    //Listamos los vehiculos
    public function index(Request $request)
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
            $query->orderBy('matricula', 'asc');  // Default order
        }

        $vehiculos = $query->get();
        return view('vehiculo.index', compact('vehiculos'));
    }

    //Eliminar un vehiculo
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado correctamente.');
    }

    //Mostrar la vista para editar un vehiculo
    public function edit($matricula)
    {
        $vehiculo = Vehiculo::findOrFail($matricula);
        return view('vehiculo.edit', compact('vehiculo'));
    }


    //Actualizar el vehiculo en la base de datos
    public function update(Request $request, $matricula)
    {
        $vehiculo = Vehiculo::findOrFail($matricula);

        $request->validate([
            'matricula' => [
                'required',
                'max:255',
                \Illuminate\Validation\Rule::unique('vehiculos')->ignore($matricula, 'matricula')
            ],
            'tipo' => 'required|in:furgoneta,camion',
        ]);

        $vehiculo->matricula = $request->matricula;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->save();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }
}