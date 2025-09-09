<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Consumidor;
use Illuminate\Database\QueryException;

use CreateUsersTable;

class UsuariosController extends Controller
{


    //procesar registro para usuarios normales consumidores
    public function registroUsuarioConsumidor(Request $request)
    {

        //validacion de datos
        $request->validate([
            'nombre_consumidor' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono_consumidor' => 'required|string|max:8',
            'clave' => 'required|string|min:8|confirmed', //confirmed espera un campo password_confirmation
        ]);

    
        if($request->hasFile('fotoPerfil_consumidor')){
            $ruta_foto_consumidor = $request->file('fotoPerfil_consumidor')->store('foto_consumidor', 'public');
        }

        $rolConsumidor = Rol::where('nombre_rol', 'Consumidor')->first(); //buscar el rol por el nombre

        //Crear al nuevo usuario usando el modelo creado
        try{
              $usuario = Consumidor::crearUsuario([
            'nombre_consumidor' => $request->nombre_consumidor,
            'correo' => $request->correo_consumidor,
            'telefono_consumidor' => $request->telefono_consumidor,
            'clave' => $request->clave,
            'rol_id' => $rolConsumidor->id, // el rol sera consumidor, esto varia dependiendo del formulario
        ]);

        }
        catch(QueryException $e){
            if($e->getCode()==="2300"){
                return back()->withErrors(['correo' => 'El correo ya esta registrado']
                )->withInput();
            }
            throw $e;
        }
        return redirect('/login');
    }


    //registro de usuarios que seran vendedores
    public function registroUsuarioVendedor(Request $request)
    {
       
    }



}
