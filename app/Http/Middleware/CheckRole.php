<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if ($request->user()->role == $role){
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'No tiene permisos suficientes.');
    }
}
