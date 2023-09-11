<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmployeeMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->account_type === 'employee') {
            return $next($request);
        }

        return redirect('/'); // Redirige vers la page d'accueil ou une autre page de votre choix
    }
}
