<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->rol != 'admin') {
            // Si el usuario no está autenticado o no tiene el rol de administrador,
            // redirigir a la página de inicio.
            Auth::logout();
            return redirect('login');
        }

        return $next($request);
    }
}