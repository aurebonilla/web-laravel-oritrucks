<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectAfterLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // if the user is not logged in, proceed with the request
            return $next($request);
        }

        // otherwise, redirect based on user role
        if (Auth::user()->rol == 'admin') {
            return redirect('/configuracion');
        } else if (Auth::user()->rol == 'cliente') {
            return redirect('/configuracionCliente');
        }

        // if the user role is not admin or cliente, proceed with the request
        return $next($request);
    }
}
