<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Viaje;
use App\Models\Conductor;
use Illuminate\Support\Facades\Log;

class UsuarioClienteController extends Controller
{
    public function show()
    {
        $usuario = auth()->user();

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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarViajes(Request $request)
    {

        if ($request->has('tipo_filtro') && $request->has('valor_filtro')) {
            return $this->filtrar($request);
        }

        if ($request->has('orden')) {
            return $this->ordenar($request);
        }


        $viajes = Viaje::paginate(5);
        return view('usuarioCliente.mostrarViajes', compact('viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createViaje()
    {
        return view('usuarioCliente.createViaje');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCliente(Request $request)
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
                'conductor_id.required' => 'El conductor es obligatorio',

            ]);

            // Calcular el precio dependiendo de la tarifa
            $precio = $request->km * ($request->tarifa == 'ESTANDAR' ? 0.4 : 0.7);

            // Verificar si el conductor ya tiene un viaje en la misma fecha
        $viajeExistente = Viaje::where('conductor_id', $request->conductor_id)
        ->where('fecha', $request->fecha)
        ->first();

        if ($viajeExistente) {
            return redirect()->back()->withErrors(['error' => 'El conductor ya tiene un viaje programado para esta fecha.']);
        }

        // Verificar si el vehículo ya tiene un viaje en la misma fecha
        $viajeExistente = Viaje::where('vehiculo_id', $request->vehiculo_id)
            ->where('fecha', $request->fecha)
            ->first();

        if ($viajeExistente) {
            return redirect()->back()->withErrors(['error' => 'El vehículo ya tiene un viaje programado para esta fecha.']);
        }


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
            $viaje->precio = $precio;
            $viaje->save();
    
            return redirect()->route('usuarioCliente.mostrarViajes');
        }
        catch(\Illuminate\Database\QueryException $e){
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error al crear el viaje.']);
        }
        
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
  
    public function destroyByIdentificador($identificador){
        $viaje = Viaje::where('identificador', $identificador)->first();
    
        if ($viaje) {
            $viaje->delete();
            return redirect()->route('usuarioCliente.mostrarViajes');
        } else {
            // Aquí puedes manejar el caso en que el viaje no existe.
            // Por ejemplo, podrías redirigir al usuario a la página de índice con un mensaje de error.
            return redirect()->route('usuarioCliente.mostrarViajes')->withErrors(['error' => 'No se encontró el viaje con el identificador proporcionado.']);
        }
    }

    public function filtrar(Request $request)
    {
        $tipo_filtro = $request->get('tipo_filtro');
        $valor_filtro = $request->get('valor_filtro');

        $query = Viaje::query();

        if ($tipo_filtro) {
            if ($tipo_filtro == 'mayor') {
                $query->whereDate('fecha', '<=', now()->subYears($valor_filtro));
            } elseif ($tipo_filtro == 'menor') {
                $query->whereDate('fecha', '>=', now()->subYears($valor_filtro));
            } else {
                $query->where($tipo_filtro, 'like', "%{$valor_filtro}%");
            }
        }

        $viajes = $query->paginate(5)->appends(['tipo_filtro' => $tipo_filtro, 'valor_filtro' => $valor_filtro]);

        return view('usuarioCliente.mostrarViajes', compact('viajes'));
    }

    public function ordenar(Request $request)
    {
        $orden = $request->get('orden');

        $query = Viaje::query();

        switch ($orden) {
            case 'fecha_asc':
                $query->orderBy('fecha', 'desc');
                break;
            case 'fecha_desc':
                $query->orderBy('fecha', 'asc');
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

        $viajes = $query->paginate(5)->appends(['orden' => $orden]);

        return view('usuarioCliente.mostrarViajes', compact('viajes'));
    }

}