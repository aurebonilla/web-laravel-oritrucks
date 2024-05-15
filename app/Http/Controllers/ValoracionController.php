<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Valoracion;
use Illuminate\Support\Facades\Log;
class ValoracionController extends Controller
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

        $valoraciones = Valoracion::paginate(5);

        return view('valoracion.index', compact('valoraciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('valoracion.create');
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
                'puntuacion' => 'required',
                'comentario' => 'required',
                'viaje_id' => 'required',
                'usuario_dni' => 'required',
            ],
            [
                'comentario.required' => 'El comentario es obligatorio.',
                'puntuacion.required' => 'La puntuación es obligatoria.',
                'viaje_id.required' => 'El viaje es obligatorio.',
                'usuario_dni.required' => 'El usuario es obligatorio.',
            ]);
            $valoracion = new Valoracion();
            $valoracion->puntuacion = $request->puntuacion;
            $valoracion->comentario = $request->comentario;
            $valoracion->viaje_id = $request->viaje_id;
            $valoracion->usuario_dni = $request->usuario_dni;
            $valoracion->save();
    
            return redirect()->route('valoracion.index');
        }
    
        catch(\Illuminate\Database\QueryException $e){
            // Log the error message and stack trace
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return redirect()->back()->withErrors(['error' => 'Error al enviar la valoración. Quizá no exista el usuario o el viaje.']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $valoracion = Valoracion::find($id);

        if (!$valoracion) {
            return redirect()->back()->with('error', 'Valoración no encontrada');
        }

        return view('valoracion.edit', ['valoracion' => $valoracion]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function update(Request $request, $id)
     {
         $valoracion = Valoracion::find($id);
 
         if (!$valoracion) {
             return redirect()->back()->with('error', 'Valoración no encontrada');
         }
 
         $request->validate([
             'puntuacion' => 'required',
             'comentario' => 'required',
         ],
         [
             'comentario.required' => 'El comentario es obligatorio',
             'puntuacion.required' => 'La puntuación es obligatoria',
         ]);
 
         // Actualizar la valoración
         $valoracion->puntuacion = $request->input('puntuacion');
         $valoracion->comentario = $request->input('comentario');
         $valoracion->save();
 
         return redirect()->route('valoracion.index')->with('success', 'Valoración modificada con éxito');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($id)
     {
         $valoracion = Valoracion::find($id);
 
         if (!$valoracion) {
             return redirect()->route('valoracion.index')->with('error', 'Valoración no encontrada');
         }
 
         $valoracion->delete();
         return redirect()->route('valoracion.index')->with('success', 'Valoración eliminada con éxito');
     }

  
    public function filtrar(Request $request)
    {
        $tipo_filtro = $request->get('tipo_filtro');
        $valor_filtro = $request->get('valor_filtro');

        $query = Valoracion::query();

        if ($tipo_filtro) {
            if ($tipo_filtro == 'mayor') {
                $query->where('puntuacion', '>=', $valor_filtro);
            } elseif ($tipo_filtro == 'menor') {
                $query->where('puntuacion', '<=', $valor_filtro);
            } else {
                $query->where($tipo_filtro, 'like', "%{$valor_filtro}%");
            }
        }

        $valoraciones = $query->paginate(5)->appends(['tipo_filtro' => $tipo_filtro, 'valor_filtro' => $valor_filtro]);

        return view('valoracion.index', compact('valoraciones'));
    }

    public function ordenar(Request $request)
    {
        $orden = $request->get('orden');

        $query = Valoracion::query();

        switch ($orden) {
            case 'punt_asc':
                $query->orderBy('puntuacion', 'asc');
                break;
            case 'punt_desc':
                $query->orderBy('puntuacion', 'desc');
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

        $valoraciones = $query->paginate(5)->appends(['orden' => $orden]);

        return view('valoracion.index', compact('valoraciones'));
    }

}