<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class SignUpController extends Controller
{

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'required',
            'password' => 'required',
            'nombre' => 'required',
            'apellidos' => 'required',
            'dni' => 'required|regex:/^[0-9]{8}[A-Za-z]$/',
            'email' => 'required|email',
            'telefono' => 'required',
            'fecha_nacimiento' => 'required|date|before:today',
            'direccion' => 'required',
        ]);

    
        $usuario = new Usuario();
        $usuario->nombre_usuario = $validated['nombre_usuario'];
        $usuario->password = Hash::make($validated['password']);
        $usuario->nombre = $validated['nombre'];
        $usuario->apellidos = $validated['apellidos'];
        $usuario->dni = $validated['dni'];
        $usuario->email = $validated['email'];
        $usuario->telefono = $validated['telefono'];
        $usuario->fecha_nacimiento = $validated['fecha_nacimiento'];
        $usuario->direccion = $validated['direccion'];

        $usuario->save();
    
        return redirect()->route('usuario.login');
    }

}