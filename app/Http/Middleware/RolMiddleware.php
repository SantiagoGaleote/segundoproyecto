<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolMiddleware
{
    /**
     * Maneja la solicitud entrante y verifica los roles del usuario autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Verifica que el usuario esté autenticado
        if (!$request->user()) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        // Verifica si el rol del usuario está en la lista permitida
        if (!in_array($request->user()->rol, $roles)) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        // Si pasa todas las validaciones, continúa con la solicitud
        return $next($request);
    }
}
