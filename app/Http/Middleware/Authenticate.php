<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * A dónde redirigir cuando la petición NO es JSON y el user no está autenticado.
     * Aquí diferenciamos rutas de admin vs. rutas públicas.
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            // Si intenta acceder a /admin o a cualquier ruta que empiece con /admin
            // o a dashboards de admin/superadmin, lo mandamos al login de admins
            if (
                $request->is('admin') ||
                $request->is('admin/*') ||
                $request->is('dashboardAdmin') 
            ) {
                
                return '/loginAdmin';
            }

            // Para el resto (usuarios normales)
            return '/login';
        }

        return null; // Para peticiones JSON, que la capa superior maneje 401
    }
}
