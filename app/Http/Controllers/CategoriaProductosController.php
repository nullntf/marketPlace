<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaProductosController extends Controller
{
    //obtener todas las categorias 

      public function categoriasProductos(){

            $categorias = 'categorias';
            return view('vendedor.crudProductos.crearProducto', compact('categorias'));
        }


    //nueva categoria de productos
        public function nuevaCategoria(Request $request){}
        
    //eliminar una categoria
    public function eliminarCategoria(Request $request){}

    //actualizar una categoria

    public function actualizarCategoria(Request $request){}
    
}
