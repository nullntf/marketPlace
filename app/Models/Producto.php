<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = [
        'nombreProduc',
        'precio',
        'descripcionProduc',
        'id_categoria',
        'id_negocio',
    ];

    // ===============================
    // RELACIONES
    // ===============================

    public function negocio()
    {
        return $this->belongsTo(Negocio::class, 'id_negocio');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // ===============================
    // FUNCIONES CRUD BÁSICAS
    // ===============================

    // Crear producto
    public static function crearProducto(array $datos)
    {
        return self::create($datos);
    }

    // Actualizar producto
    public function actualizarProducto(array $datos)
    {
        return $this->update($datos);
    }

    // Eliminar producto
    public function eliminarProducto()
    {
        return $this->delete();
    }

    // Listar todos los productos
    public static function listarProductos()
    {
        return self::all();
    }

    // Obtener un producto por ID
    public static function encontrarProducto($id)
    {
        return self::find($id);
    }

    // ===============================
    // CONSULTA CON JOIN(con nombre del vendedor, la direccion y la categoria)
    // ===============================
    public static function listarProductosConDetalles()
    {
        return self::select(
            'producto.id',
            'producto.nombreProduc',
            'producto.precio',
            'producto.descripcionProduc',
            'usuario.nombre_completo as nombre_vendedor',
            'direccion.departamento',
            'direccion.municipio',
            'direccion.canton',
            'categoria.nombreCategoria as nombre_categoria', // <-- ¡Nuevo! Nombre de la categoría
            'producto.created_at'
        )
            ->join('negocio', 'negocio.id', '=', 'producto.id_negocio')
            ->join('usuario', 'usuario.id', '=', 'negocio.id_usuario')
            ->join('direccion', 'direccion.id', '=', 'negocio.id_direccion')
            ->join('categoria', 'categoria.id', '=', 'producto.id_categoria') // <-- ¡Nuevo JOIN!
            ->get();
    }


}
