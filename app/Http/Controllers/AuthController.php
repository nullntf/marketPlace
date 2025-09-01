<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    //procesar login usuarios normales, vendedor o consumidor 
    public function loginUsuarios(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credenciales = $request->only('correo', 'password');

        if (Auth::guard('web')->attempt($credenciales)) {

            $request->session()->regenerate();

            return redirect()->intended('/'); //pagina protegida
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
            return redirect()->intended('/login'); //pagina a la que redirige una vez hecho el inicio de session
        }
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
