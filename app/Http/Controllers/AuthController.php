<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    //procesar login usuarios normales, vendedor o consumidor 
    public function loginUsuarios(Request $request)
    {
        //validar datos 
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|min:8',
        ]);


        $credenciales = $request->only('correo', 'password');

        if (Auth::guard('consumidor')->attempt($credenciales)) {

            $request->session()->regenerate();
            $usuario = Auth::guard('consumidor')->user();
            //Redirigir segun el rol 
            switch ($usuario->rol->nombre_rol) {
                case 'Vendedor':
                    return  redirect()->route('vista.vendedor');
                case 'Consumidor':
                    return redirect()->route('consumidor.vista'); //ruta a la que redirige segun el rol
                default:
                    return redirect('/login');
            }
        }
        //si falla el login
        return back()->withErrors([
            'correo' => 'Las credenciales no son correctas',
        ]);
    }


    //login de administradores de la aplicacion
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $credenciales = $request->only('correo', 'password');

        if (Auth::guard('admin')->attempt($credenciales)) {
            $request->session()->regenerate();
            $usuario = Auth::guard('admin')->user();

            //redirige segun el rol, superAdmin, admin
            switch ($usuario->rol->nombre_rol) {
                case 'SuperAdmin':
                    return redirect()->route('SuperAdmin.vista'); //redirige a la vista segun el rol
                case 'Admin':
                    return redirect()->route('SuperAdmin.vista');
                default:
                    return redirect('/loginAdmin');
            }
        }
            return back()->withErrors([
                'correo' => 'Las credenciales no son correctas',
            ]);
    }


    //Cerrar sesion para usuarios normales como vendedor o consumidor
    public function logoutUsuarios(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    //Cerrar session para administradores
    public function logoutAdmin(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginAdmin');
    }
}
