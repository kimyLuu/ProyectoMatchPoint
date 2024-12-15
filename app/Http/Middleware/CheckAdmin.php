<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Maneja la solicitud entrante.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return $next($request); // Acceso completo para el admin
        }

        if ($user->role === 'client') {
            // Permitir acceso a estas rutas para clientes
            if (
                $request->is('calendar') || 
                $request->is('reservations') || 
                $request->is('reservations/create') || 
                $request->is('reservations/*/edit') || 
                $request->is('reservations/*/payment')
            ) {
                return $next($request);
            }
        }

        // Redirigir al dashboard si no tiene permisos
        return redirect('/dashboard')->with('error', 'No tienes permisos para acceder.');
    }
}
