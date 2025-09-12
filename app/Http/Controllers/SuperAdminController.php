<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Direccion;
use App\Models\Negocio;
use Illuminate\Http\Request;
use App\Models\Rol;
use App\Models\Vendedor;
use Illuminate\Database\QueryException;
use Monolog\Handler\RollbarHandler;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    //agregar nuevos administradores


    public function rolesSistema(){
       $roles = Rol::all();
        return view('admin.crudAdmin.createAdmin', compact('roles'));
    }
    
    public function obtenerDirecciones(){
        $departamento = Direccion::all();
        return view('admin.crudVendedor.crearVendedor', compact('departamento'));
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

    //crear nuevos vendedores
    public function crearVendedor(Request $request){

        $roles = Rol::where('nombre_rol',  'Vendedor')->first();

        $request->validate([
            'nombre_vendedor' => 'required|string|max:250',
            'dui' => 'required|string|max:10',
            'correo' => 'required|string|email',
            'telefono_vendedor' => 'required|string|max:8',
            'password' => 'required|string|confirmed',
            'fotoPerfil_vendedor' => 'image|mines:png, jpeg, jpg:max:2048',
            'nombre_negocio' => 'required|string|max:250',
            'telefono'=> 'required|string|max:8',
            'direccion'=> 'required|string|max:250',
            'descripcion' => 'required|string|max:250',
        ]);
        
            DB::beginTransaction();

            //crear un nuevo vendedor con su modelo 
            try{
                $vendedor = Vendedor::crearVendedor([
                    'nombre_vendedor' => $request->nombre_vendedor,
                    'correo' => $request->correo,
                    'dui'=> $request->dui,
                    'telefono_vendedor' => $request->telefono_vendedor,
                    'password' => $request->password,
                    'rol_id' => $roles, 
                ]);

                $direccionNegocio = Direccion::crearDireccion([
                    'direccion' => $request->direccion_negocio,
                    ''
                ]);

                $negocio = Negocio::crearNegocio([
                    'nombre_negocio' => $request->nombre_negocio,
                    'telefono'=> $request->telefono,
                    'descripcion'=> $request->descripcion,
                    'id_direccion'=> $request->id,
                    'id_vendedor' => $request->id,
                    
                ]);

                DB::commit();
                return redirect('/verVendedor');
            }

            catch(\Exception $e){
                DB::rollBack();
                return back()->withErrors(['error' => $e->getMessage()])->withInput();
            }

              
    }
    
}
