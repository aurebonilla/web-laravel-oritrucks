<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Mostramos la vista para completar los campos y añadir el vehiculo a la base de datos
    public function create()
    {
        return view('vehiculo.create');
    }

    //Hacemos el input en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'matricula' => [
                'required',
                'max:255',
                'regex:/^\d{4}\s?[A-Z]{3}$|^[A-Z]{1,3}-\d{1,4}-[A-Z]{1,3}$/i', // Para matriculas europeas y amercianas
                'unique:vehiculos'
            ],
            'tipo' => 'required|in:furgoneta,camion',
        ], [
            'matricula.required' => 'La matrícula es obligatoria.',
            'matricula.regex' => 'El formato de la matrícula no es válido.',
            'matricula.unique' => 'Esta matrícula ya está registrada.',
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
            $query->orderBy('matricula', 'asc');
        }

        $vehiculos = $query->paginate(5);
        return view('vehiculo.index', compact('vehiculos'));
    }

    //Eliminar un vehiculo
    public function destroy($id)
{
    $vehiculo = Vehiculo::findOrFail($id);

    if ($vehiculo->viajes->count() > 0) {
        return redirect()->route('vehiculos.index')->with('error', 'No se puede eliminar el vehículo porque está asignado a uno o más viajes.');
    }

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

        if ($vehiculo->viajes->count() > 0) {
            return redirect()->route('vehiculos.index')->with('error', 'No se puede modificar el vehículo porque está asignado a uno o más viajes.');
        }

        $request->validate([
            'matricula' => [
                'required',
                'max:255',
                'regex:/^\d{4}\s?[A-Z]{3}$|^[A-Z]{1,3}-\d{1,4}-[A-Z]{1,3}$/i', // Acepta matriculas europeas y americanas
                \Illuminate\Validation\Rule::unique('vehiculos')->ignore($matricula, 'matricula')
            ],
            'tipo' => 'required|in:furgoneta,camion',
        ], [
            'matricula.required' => 'La matrícula es obligatoria.',
            'matricula.regex' => 'El formato de la matrícula no es válido.',
            'matricula.unique' => 'Esta matrícula ya está registrada.',
        ]);

        $vehiculo->matricula = $request->matricula;
        $vehiculo->tipo = $request->tipo;
        $vehiculo->save();

        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado correctamente.');
    }
}