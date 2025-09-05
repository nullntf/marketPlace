<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Usuario;
use CreateUsersTable;

class UsuariosController extends Controller
{


    //procesar registro para usuarios normales consumidores 
    public function registroUsuarioConsumidor(Request $request)
    {

        //validacion de datos
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios,correo',
            'telefono' => 'required|string|max:8',
            'password' => 'required|string|min:8|confirmed', //confirmed espera un campo password_confirmation
        ]);

        //Crear al nuevo usuario usando el modelo creado 

        $rolConsumidor = Rol::where('nombre_rol', 'Consumidor')->first(); //buscar el rol por el nombre

        $usuario = Usuario::crearUsuario([
            'nombre_completo' => $request->nombre_completo,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'password' => $request->password,
            'rol_id' => $rolConsumidor->id, // el rol sera consumidor, esto varia dependiendo del formulario


        ]);

        return redirect('/login');
    }

    //registro de usuarios que seran vendedores
    public function registroUsuarioVendedor(Request $request)
    {

        //validacion de los datos
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'correo' => 'required|string|unique:usuarios,correo',
            'telefono' => 'required|string|max:8',
            'password' => 'required|string|min:8|confirmed', //espera un campo de confirmacion de password

            
            //datos que se guardaran en la tabla de negocios
            'nombre_negorcio' => 'required|string|max:250',
            'descripcion_negocio' => 'required|string|max:250',
            'direccion' => 'required|string|max:250',
            'logo_negocio' => 'required|image|mimes:jpg,jpeg, png|max:2048', //guardar la imagen subida 
        ]);
        //crear un usuario en base al modelo de usuarios
        
        if($request->hasFile('logo_negocio')){
            $rutaLogo = $request->file('logo_negocio')->store('logos', 'public'); //esto guarda los logos  en la ruta de storage, una vez se suba el prime logo se crea la carpeta logos
        }

        //obtener el rol 
        $rolVendedor = Rol::where('nombre_rol', 'Vendedor')->first();

            $usuario = Usuario::crearUsuario([
                'nombre_completo' => $request->nombre_completo,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'password' => $request->password,
                'nombre_negocio' => $request->nombre_negocio,
                'descripcion_negocio' => $request->descripcion_negocio,
                'direccion' => $request->direccion,
                'logo_negocio' => $rutaLogo,
                'rol_id' => $rolVendedor->id, //el rol sera el de vendedor aquellos que sean seleccionados
            ]);

            return redirect('verficacion.vista'); 
    }


    
}
