<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Rol;

class SuperAdminController extends Controller
{
    //agregar nuevos administradores
    public function nuevoAdmin(Request $request){
            
            $request->validate([
                'nombre' => 'required|string|max:250',
                'apellido' => 'required|string|max:250',
                'correo' => 'required|string|email',
                'clave' => 'required|string|min:8',
                'rol' => 'required|string|50',


            ]);

            $rolAdministrador = Rol::where('nombre_rol', 'Admin');

            //crear admin con el modelo Admin

            $admin = Admin::crearAdmin([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'correo' => $request->correo,
                'clave' => $request->clave,
                'rol_id' => $rolAdministrador->id
              //'rol_id' => $request->rol,
            ]);

           return redirect('administradores.sistema');
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
