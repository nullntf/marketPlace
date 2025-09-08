<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedoresController extends Controller
{
    public function nuevoProducto(Request $request){
        $request->validate([
            'nombre_producto' => 'required|string|max:250',
            'descripcion' => 'required|string|max:250',
            'precio' => 'required|string|max:50',
            'categoria' => 'required|exists:categorias,id',
            'imagen_producto' =>'required|image|mines:jpg,jpeg, png|max:2048',
        ]);

        if($request->hasFile('imagen_producto')){
            $ruta_producto = $request->file('imagen_producto')->store('productos', 'public');
        }
            //crear el nuevo producto 
    }

        //obtener las categorias de los productos


      

}
