<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direccion'; 

    protected $fillable = [
        'departamento',
        'municipio',
        'canton',
    ];

    // ===============================
    // Funciones básicas CRUD
    // ===============================

    // Crear dirección
    public static function crearDireccion(array $datos)
    {
        return self::create($datos);
    }

    // Actualizar dirección
    public function actualizarDireccion(array $datos)
    {
        return $this->update($datos);
    }

    // Eliminar dirección
    public function eliminarDireccion()
    {
        return $this->delete();
    }

    // Obtener todas las direcciones
    public static function listarDirecciones()
    {
        return self::all();
    }
}