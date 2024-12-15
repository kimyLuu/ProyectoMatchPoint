<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
   /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
       // Permitir acceso a la edición de reservas si es cliente
        if (Auth::user()->role == 'client' && $request->is('reservations/*/edit')) {
            return $next($request);
        }

        // Redirige si no cumple las condiciones
        return redirect('/dashboard')->with('error', 'No tienes permisos para acceder.');
       
    }
}


