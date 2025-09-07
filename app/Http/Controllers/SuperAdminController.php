<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Rol;
use Monolog\Handler\RollbarHandler;

class SuperAdminController extends Controller
{
    //agregar nuevos administradores

    public function rolesSistema(){
       $roles = Rol::all();
        return view('admin.crudAdmin.createAdmin', compact('roles'));
    }


    public function nuevoAdmin(Request $request){

            $request->validate([
                'nombre' => 'required|string|max:250',
                'apellido' => 'required|string|max:250',
                'correo' => 'required|string|email',
                'clave' => 'required|string|min:8',
                'rol_id' => 'required|exists:roles,id',
            ]);

            //crear admin con el modelo Admin
            $admin = Admin::crearAdmin([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'correo' => $request->correo,
                'clave' => $request->clave,
                'rol_id' => $request->rol_id,
            ]);

           return redirect('/showAdmin');
    }


    //eliminar administradores
    public function eliminarAdministrador(Request $request){
        $admin = Admin::eliminarAdmin();
    }


    //ver vendedores registrados 
    public function verVendedores(){}

    //actualizar administradores 
    public function actualizarAdministradores(Request $request){

        $request->validate([
            'nombre' => 'required|string|max:250',
            'apellido'=> 'required|string|max:250',
            'correo' => 'required|string|email',
            'clave' => 'required|string|min:8',
        ]);

        $usuarioAdmin = Admin::actualizarAdmin([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'correo' => $request->correo,
            'clave' => $request->clave,
        ]);
        
        return redirect()->route('vista.administradores');
    }

    
}
