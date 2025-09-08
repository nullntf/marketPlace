<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable = [
        'nombreCategoria',
    ];

    // ===============================
    // FUNCIONES BÁSICAS CRUD
    // ===============================

    // Crear categoría
    public static function crearCategoria(array $datos)
    {
        return self::create($datos);
    }

    // Actualizar categoría
    public function actualizarCategoria(array $datos)
    {
        return $this->update($datos);
    }

    // Eliminar categoría
    public function eliminarCategoria()
    {
        return $this->delete();
    }

    // Listar todas las categorías
    public static function listarCategorias()
    {
        return self::all();
    }
}
