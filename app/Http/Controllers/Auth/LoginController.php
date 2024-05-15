<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        // Redirige a los usuarios con el rol 'admin' a la ruta 'configuracion'
        if ($user->rol == 'admin') {
            return redirect()->route('usuario.show');
        } 
        else if ($user->rol == 'cliente') {
            return redirect()->route('usuarioCliente.show');
        }
    
        // Redirige a todos los demás usuarios a la ruta 'home'
        return redirect('/home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
