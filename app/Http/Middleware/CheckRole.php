<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRole = auth()->user()->role;

        // Si el usuario no tiene el rol permitido, mostramos un mensaje detallado con los datos reales
        if (!in_array($userRole, $roles)) {
            $rolesPermitidos = implode(', ', $roles);
            abort(403, "ACCESO DENEGADO DE DEBUGEÓ: Tu usuario actual tiene el rol [{$userRole}] y esta ruta exige uno de estos: [{$rolesPermitidos}].");
        }

        return $next($request);
    }
}