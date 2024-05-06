<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return Usuario::create([
            'nombre_usuario' => $data['nombre_usuario'],
            'password' => Hash::make($data['password']),
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'dni' => $data['dni'],
            'email' => $data['email'],
            'telefono' => $data['telefono'],
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'direccion' => $data['direccion'],
            'rol' => 'cliente',
        ]);
    }
}

/*        $validated = $request->validate([
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

return redirect()->route('usuario.login');*/
