<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario;
use CreateUsersTable;

class UsuariosController extends Controller
{


    //procesar registro para usuarios normales consumidores 
    public function registroUsuarioConsumidor(Request $request){

            //validacion de datos
            $request->validate([
                'nombre_completo'=> 'required|string|max:255',
                'correo' => 'required|email|unique:usuarios,correo',
                'telefono' => 'required|string|max:8',
                'password' => 'required|string|min:8|confirmed', //confirmed espera un campo password_confirmation
            ]);

            //Crear al nuevo usuario usando el modelo creado 

            $rolConsumidor = Rol::where('nombre_rol', 'Consumidor')->first(); //buscar el nombre por rol

           $usuario = Usuario::crearUsuario([
                'nombre_completo'=>$request->nombre_completo,
                'correo'=>$request->correo,
                'telefono'=>$request->telefono,
                'password'=>$request->password,
                'rol_id' => $rolConsumidor->id, // el rol sera consumidor, esto varia dependiendo del formulario
            ]);

            
           
            return redirect('/login');
    }

    //registro de usuarios que seran vendedores
    public function registroUsuarioVendedor(){

    }

}
