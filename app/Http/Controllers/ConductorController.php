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
    public function index()
    {
        $conductores = Conductor::all();
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
                'dni' => 'required|size:9',
                'telefono' => 'required|digits:9',
                'carnet' => 'required|in:B,C1',
                'fecha_nacimiento' => 'required|date|before:-18 years',
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
                'telefono.required' => 'El teléfono es obligatorio',
                'telefono.digits' => 'El teléfono debe tener 9 dígitos',
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

        try{
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'email' => 'required|email',
                'dni' => 'required|size:9',
                'telefono' => 'required|digits:9',
                'carnet' => 'required|in:B,C1',
                'fecha_nacimiento' => 'required|date|before:-18 years',
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
                'telefono.required' => 'El teléfono es obligatorio',
                'telefono.digits' => 'El teléfono debe tener 9 dígitos',
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
        $conductor->delete();
        return redirect()->route('conductor.index');
    }
}
