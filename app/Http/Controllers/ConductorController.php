<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Conductor;

class ConductorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('tipo_filtro') && $request->has('valor_filtro')) {
            return $this->filtrar($request);
        }

        if ($request->has('orden')) {
            return $this->ordenar($request);
        }

        $conductores = Conductor::paginate(5);

        return view('conductor.index', compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('conductor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email',
                'dni' => 'required|size:9|regex:/^[0-9]{8}[A-Z]$/',
                'carnet' => 'required|in:B,C1',
                'fecha_nacimiento' => 'required|date|before:-18 years',
                'telefono' => 'required|digits:9|regex:/^[6-7][0-9]{8}$/',
            ],
            [
                'nombre.required' => 'El nombre es obligatorio',
                'apellidos.required' => 'Los apellidos son obligatorios',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe ser válido',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
                'fecha_nacimiento.before' => 'Debes ser mayor de edad para registrarte',
                'dni.required' => 'El DNI es obligatorio',
                'dni.size' => 'El DNI debe tener 9 caracteres',
                'dni.regex' => 'Formato de DNI incorrecto, Ej: 12345678A',
                'telefono.required' => 'El teléfono es obligatorio',
                'telefono.digits' => 'El teléfono debe tener 9 dígitos',
                'telefono.regex' => 'El teléfono debe empezar con 6 o 7',
                'carnet.required' => 'El carnet es obligatorio',
                'carnet.in' => 'El carnet debe ser B o C1',
            ]);
            $conductor = new Conductor();
            $conductor->nombre = $request->nombre;
            $conductor->apellidos = $request->apellidos;
            $conductor->dni = $request->dni;
            $conductor->email = $request->email;
            $conductor->carnet = $request->carnet;
            $conductor->fecha_nacimiento = $request->fecha_nacimiento;
            $conductor->telefono = $request->telefono;
            $conductor->save();
    
            return redirect()->route('conductor.index');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['error' => 'Error al crear el conductor. Quizás ya existe un conductor con ese DNI o email.']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $conductor = Conductor::where('dni', $dni)->first();

        if (!$conductor) {
            return redirect()->back()->with('error', 'Conductor no encontrado');
        }

        return view('conductor.edit', ['conductor' => $conductor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dni)
    {
        $conductor = Conductor::where('dni', $dni)->first();

        if (!$conductor) {
            return redirect()->back()->with('error', 'Conductor no encontrado');
        }

        if ($conductor->viajes->count() > 0) {
            return redirect()->route('conductor.index')->with('error', 'No se puede modificar el conductor porque está asignado a uno o más viajes.');
        }

        try{
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email',
                'dni' => 'required|size:9|regex:/^[0-9]{8}[A-Z]$/',
                'carnet' => 'required|in:B,C1',
                'fecha_nacimiento' => 'required|date|before:-18 years',
                'telefono' => 'required|digits:9|regex:/^[6-7][0-9]{8}$/',
            ],
            [
                'nombre.required' => 'El nombre es obligatorio',
                'apellidos.required' => 'Los apellidos son obligatorios',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe ser válido',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
                'fecha_nacimiento.before' => 'Debes ser mayor de edad para registrarte',
                'dni.required' => 'El DNI es obligatorio',
                'dni.size' => 'El DNI debe tener 9 caracteres',
                'dni.regex' => 'Formato de DNI incorrecto, Ej: 12345678A',
                'telefono.required' => 'El teléfono es obligatorio',
                'telefono.digits' => 'El teléfono debe tener 9 dígitos',
                'telefono.regex' => 'El teléfono debe empezar con 6 o 7',
                'carnet.required' => 'El carnet es obligatorio',
                'carnet.in' => 'El carnet debe ser B o C1',
            ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['error' => 'Error al modificar el conductor. Quizás ya existe un conductor con ese DNI o email.']);
        }

        $conductor->update($request->all());

        return redirect()->route('conductor.index')->with('success', 'Conductor modificado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function destroyByEmail($email){
        $conductor = Conductor::where('email', $email)->first();

        if ($conductor->viajes->count() > 0) {
            return redirect()->route('conductor.index')->with('error', 'No se puede eliminar el conductor porque está asignado a uno o más viajes.');
        }

        $conductor->delete();
        return redirect()->route('conductor.index');
    }

    public function filtrar(Request $request)
    {
        $tipo_filtro = $request->get('tipo_filtro');
        $valor_filtro = $request->get('valor_filtro');

        $query = Conductor::query();

        if ($tipo_filtro) {
            if ($tipo_filtro == 'mayor') {
                $query->whereDate('fecha_nacimiento', '<=', now()->subYears($valor_filtro));
            } elseif ($tipo_filtro == 'menor') {
                $query->whereDate('fecha_nacimiento', '>=', now()->subYears($valor_filtro));
            } else {
                $query->where($tipo_filtro, 'like', "%{$valor_filtro}%");
            }
        }

        $conductores = $query->paginate(5)->appends(['tipo_filtro' => $tipo_filtro, 'valor_filtro' => $valor_filtro]);

        return view('conductor.index', compact('conductores'));
    }


    public function ordenar(Request $request)
    {
        $orden = $request->get('orden');

        $query = Conductor::query();

        switch ($orden) {
            case 'edad_asc':
                $query->orderBy('fecha_nacimiento', 'desc');
                break;
            case 'edad_desc':
                $query->orderBy('fecha_nacimiento', 'asc');
                break;
            case 'modificacion_asc':
                $query->orderBy('updated_at', 'asc');
                break;
            case 'modificacion_desc':
                $query->orderBy('updated_at', 'desc');
                break;
            case 'creacion_asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'creacion_desc':
                $query->orderBy('created_at', 'desc');
                break;
        }

        $conductores = $query->paginate(5)->appends(['orden' => $orden]);

        return view('conductor.index', compact('conductores'));
    }
}