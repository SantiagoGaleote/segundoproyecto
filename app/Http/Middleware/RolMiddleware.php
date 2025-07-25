<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!in_array($request->user()->rol, $roles)) {
            return response()->json(['mensaje' => 'Acceso denegado. Rol no autorizado.'], 403);
        }

        return $next($request);
    }
}


