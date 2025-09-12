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
        $user = null;
        $currentGuard = null;

        // Verificar primero el guard admin
        if (Auth::guard('admin')->check()) {
            $user = Auth::guard('admin')->user();
            $currentGuard = 'admin';
        }
        // Si no hay usuario admin, verificar el guard web (usuarios normales)
        elseif (Auth::guard('consumidor')->check()) {
            $user = Auth::guard('consumidor')->user();
            $currentGuard = 'consumidor';
        }

        // Si no hay usuario logueado en ningún guard
        if (!$user) {
            // Si es ruta de admin → redirigir a login admin
            if ($request->is('admin*') || in_array('SuperAdmin', $roles) || in_array('Admin', $roles)) {
                return redirect('/loginAdmin')
                    ->withErrors('Debes iniciar sesión como administrador');
            }

            // Si es ruta de usuario normal → redirigir a login de usuarios
            return redirect()->route('users.login')
                ->withErrors('Debes iniciar sesión');
        }

        // Validar si el rol del usuario está en los permitidos
        if (!in_array($user->rol->nombre_rol, $roles)) {
            abort(403, 'No tienes permiso para acceder a esta sección');
        }

        return $next($request);
    }
}
