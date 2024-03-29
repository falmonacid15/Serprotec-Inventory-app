<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->user();

        foreach ($roles as $role) {
           if ($user->hasRole($role)) {
               return $next($request);
           }
        }

        return redirect()->route('home')->with('error', 'No tiene permisos suficientes.');
    }
}
