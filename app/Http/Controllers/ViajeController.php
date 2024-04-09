<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\Viaje;
use App\Models\Vehiculo;
use App\Models\Conductor;

class ViajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viaje::all();
        return view('viaje.index', compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        $conductors = Conductor::all();
        $viajes = Viaje::all(); // Asegúrate de que esta línea está antes de compact

        return view('viaje.create', compact('vehiculos', 'conductors'));
        //return view('viaje.create');
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
                //'identificador' => 'required',
                'fecha' => 'required|date',
                'duracion' => 'required',
                'origen' => 'required',
                'destino' => 'required',
                'km' => 'required',
                'tarifa' => 'required|in:ESTANDAR,PREMIUM',
                //tengo q poner vehiculo_id?? y conductor_id??
                'vehiculo_id' => 'required|exists:vehiculos,matricula',
                'conductor_id' => 'required|exists:conductors,dni',
            ],
            [
                //'identificador.required' => 'El identificador es obligatorio',
                'fecha.required' => 'La fecha es obligatoria',
                'duracion.required' => 'La duracion del viaje es obligatoria',
                'origen.required' => 'El origen de salida es obligatorio',
                'destino.required' => 'El destino de llegada es obligatorio',
                'km.required' => 'El numero de KM es obligatorio',
                'tarifa.required' => 'La tarifa es obligatoria',
                'tarifa.in' => 'La tarifa debe ser ESTANDAR o PREMIUM',

                'vehiculo_id.required' => 'La tarifa es obligatoria',
                'tarifa.in' => 'La tarifa debe ser ESTANDAR o PREMIUM',

            ]);
            $viaje = new Viaje();
            $viaje->identificador = uniqid(); // Genera un identificador único automáticamente
            //$viaje->identificador = $request->identificador;
            $viaje->fecha = $request->fecha;
            $viaje->duracion = $request->duracion;
            $viaje->origen = $request->origen;
            $viaje->destino = $request->destino;
            $viaje->km = $request->km;
            $viaje->tarifa = $request->tarifa;
            $viaje->vehiculo_id = $request->vehiculo_id;
            $viaje->conductor_id = $request->conductor_id;
            $viaje->save();
    
            return redirect()->route('viaje.index');
        }
        catch(\Illuminate\Database\QueryException $e){
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error al crear el viaje.']);
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
    public function edit($identificador)
    {
        $viaje = Viaje::where('identificador', $identificador)->first();

        if (!$viaje) {
            return redirect()->back()->with('error', 'Viaje no encontrado');
        }
        $vehiculos = Vehiculo::all(); // Busca todos los vehículos
        $conductors = Conductor::all(); // Busca todos los conductores

        return view('viaje.edit', compact('viaje', 'vehiculos', 'conductors')); // Pasa los vehículos y los conductores a la vista
        //return view('viaje.edit', ['viaje' => $viaje]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $identificador)
    {
        $viaje = Viaje::where('identificador', $identificador)->first();

        if (!$viaje) {
            return redirect()->back()->with('error', 'Viaje no encontrado');
        }

        try{
            $request->validate([
                //'identificador' => 'required',
                'fecha' => 'required|date',
                'duracion' => 'required',
                'origen' => 'required',
                'destino' => 'required',
                'km' => 'required',
                'tarifa' => 'required|in:ESTANDAR,PREMIUM',
                //tengo q poner vehiculo_id?? y conductor_id??
                'vehiculo_id' => 'required|exists:vehiculos,matricula',
                'conductor_id' => 'required|exists:conductors,dni',
            ],
            [
                //'identificador.required' => 'El identificador es obligatorio',
                'fecha.required' => 'La fecha es obligatoria',
                'duracion.required' => 'La duracion del viaje es obligatoria',
                'origen.required' => 'El origen de salida es obligatorio',
                'destino.required' => 'El destino de llegada es obligatorio',
                'km.required' => 'El numero de KM es obligatorio',
                'tarifa.required' => 'La tarifa es obligatoria',
                'tarifa.in' => 'La tarifa debe ser ESTANDAR o PREMIUM',
                'vehiculo_id.required' => 'El vehiculo es obligatorio',
                'conductor_id.required' => 'El conductor es obligatorio',
            ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['error' => 'Error al modificar el viaje.']);
        }

        $viaje->update($request->all());

        return redirect()->route('viaje.index')->with('success', 'Viaje modificado con éxito');
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
/*
    public function destroyByIdentificador($identificador){
        $viaje = Viaje::where('identificador', $identificador)->first();
        $viaje->delete();
        return redirect()->route('viaje.index');
    }*/
    public function destroyByIdentificador($identificador){
        $viaje = Viaje::where('identificador', $identificador)->first();
    
        if ($viaje) {
            $viaje->delete();
            return redirect()->route('viaje.index');
        } else {
            // Aquí puedes manejar el caso en que el viaje no existe.
            // Por ejemplo, podrías redirigir al usuario a la página de índice con un mensaje de error.
            return redirect()->route('viaje.index')->withErrors(['error' => 'No se encontró el viaje con el identificador proporcionado.']);
        }
    }
}