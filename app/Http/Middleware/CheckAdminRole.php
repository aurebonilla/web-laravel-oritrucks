<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->rol != 'admin') {
            Auth::logout();
            return redirect('login');
        }

        return $next($request);
    }
}