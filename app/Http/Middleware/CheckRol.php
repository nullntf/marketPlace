<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRol
{
   public function handle(Request $request, Closure $next, ...$roles)
{
    $user = Auth::user();

    if (!$user) {
        return redirect('/login')->withErrors('Debes iniciar sesión');
    }

    if (!in_array($user->rol->nombre_rol, $roles)) {
        abort(403, 'No tienes permiso para acceder a esta sección');
    }

    return $next($request);
}
}