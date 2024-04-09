<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

class AdministradorUsuariosController extends Controller
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

        $usuarios = Usuario::all();

        return view('administradorUsuarios.index', compact('usuarios'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administradorUsuarios.create');
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
                'nombre_usuario' => 'required',
                'password' => 'required',
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required|regex:/^[0-9]{8}[A-Za-z]$/',
                'email' => 'required|email',
                'telefono' => 'required|digits:9',
                'fecha_nacimiento' => 'required|date|before:-18 years',
                'direccion' => 'required',
            ],
            [
                'nombre_usuario.required' => 'El usuario es obligatorio',
                'password.required' => 'La contraseña es obligatorio',
                'nombre.required' => 'El nombre es obligatorio',
                'apellidos.required' => 'Los apellidos son obligatorios',
                'dni.required' => 'El DNI es obligatorio',
                'dni.size' => 'El DNI debe tener 9 caracteres',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe ser válido',
                'telefono.required' => 'El teléfono es obligatorio',
                'telefono.digits' => 'El teléfono debe tener 9 dígitos',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
                'fecha_nacimiento.before' => 'Debes ser mayor de edad para registrarte',
                'direccion.required' => 'La direccion es obligatoria',
            ]);
            $usuario = new Usuario();
            $usuario->nombre_usuario = $request->nombre_usuario;
            $usuario->password = $request->password;
            $usuario->nombre = $request->nombre;
            $usuario->apellidos = $request->apellidos;
            $usuario->dni = $request->dni;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->fecha_nacimiento = $request->fecha_nacimiento;
            $usuario->direccion = $request->direccion;
            $usuario->save();
    
            return redirect()->route('administradorUsuarios.index');
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['error' => 'Error al crear el usuario. Quizás ya existe un usuario con ese nombre,DNI ,email o telefono.']);
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
        $usuario = Usuario::where('dni', $dni)->first();

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        return view('administradorUsuarios.edit', ['usuario' => $usuario]);
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
        $usuario = Usuario::where('dni', $dni)->first();

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        try{
            $request->validate([
                'nombre_usuario' => 'required',
                'password' => 'required',
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required|regex:/^[0-9]{8}[A-Za-z]$/',
                'email' => 'required|email',
                'telefono' => 'required|digits:9',
                'fecha_nacimiento' => 'required|date|before:-18 years',
                'direccion' => 'required',
            ],
            [
                'nombre_usuario.required' => 'El usuario es obligatorio',
                'password.required' => 'La contraseña es obligatorio',
                'nombre.required' => 'El nombre es obligatorio',
                'apellidos.required' => 'Los apellidos son obligatorios',
                'dni.required' => 'El DNI es obligatorio',
                'dni.size' => 'El DNI debe tener 9 caracteres',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe ser válido',
                'telefono.required' => 'El teléfono es obligatorio',
                'telefono.digits' => 'El teléfono debe tener 9 dígitos',
                'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
                'fecha_nacimiento.before' => 'Debes ser mayor de edad para registrarte',
                'direccion.required' => 'La direccion es obligatoria',
            ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            return redirect()->back()->withErrors(['error' => 'Error al modificar el usuario. Quizás ya existe un usuario con ese nombre, DNI ,email o telefono.']);
        }

        $usuario->update($request->all());

        return redirect()->route('administradorUsuarios.index')->with('success', 'Usuario modificado con éxito');
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
        $usuario = Usuario::where('email', $email)->first();
        $usuario->delete();
        return redirect()->route('administradorUsuarios.index');
    }

    public function filtrar(Request $request)
    {
        $tipo_filtro = $request->get('tipo_filtro');
        $valor_filtro = $request->get('valor_filtro');

        $query = Usuario::query();

        if ($tipo_filtro) {
            if ($tipo_filtro == 'mayor') {
                $query->whereDate('fecha_nacimiento', '<=', now()->subYears($valor_filtro));
            } elseif ($tipo_filtro == 'menor') {
                $query->whereDate('fecha_nacimiento', '>=', now()->subYears($valor_filtro));
            } else {
                $query->where($tipo_filtro, 'like', "%{$valor_filtro}%");
            }
        }

        $usuarios = $query->get();

        return view('administradorUsuarios.index', compact('usuarios'));
    }

    public function ordenar(Request $request)
    {
        $orden = $request->get('orden');

        $query = Usuario::query();

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

        $usuarios = $query->get();

        return view('administradorUsuarios.index', compact('usuarios'));
    }

}