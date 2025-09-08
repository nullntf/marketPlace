<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;

    protected $table = 'negocio';

    protected $fillable = [
        'descripcion',
        'telefono',
        'id_direccion',
        'id_vendedor',
    ];

    // ===============================
    // RELACIONES
    // ===============================

    // Relación con Vendedor
    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class, 'id_vendedor');
    }

    // Relación con Dirección
    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'id_direccion');
    }

    // ===============================
    // FUNCIONES CRUD BÁSICAS
    // ===============================

    // Crear negocio
    public static function crearNegocio(array $datos)
    {
        return self::create($datos);
    }

    // Actualizar negocio
    public function actualizarNegocio(array $datos)
    {
        return $this->update($datos);
    }

    // Eliminar negocio
    public function eliminarNegocio()
    {
        return $this->delete();
    }

    // Listar todos los negocios
    public static function listarNegocios()
    {
        return self::all();
    }

    // Obtener un negocio por ID
    public static function encontrarNegocio($id)
    {
        return self::find($id);
    }

    // ===============================
    // CONSULTA CON JOIN (con la info del nombre del vendedor y la dirección del negocio)
    // ===============================

    public static function listarNegociosConDetalles()
    {
        return self::select(
            'negocio.id',
            'negocio.descripcion',
            'negocio.telefono',
            'vendedor.nombre_vendedor as nombre_vendedor',
            'direccion.departamento',
            'direccion.municipio',
            'direccion.canton',
            'negocio.created_at'
        )
            ->join('vendedor', 'vendedor.id', '=', 'negocio.id_vendedor')
            ->join('direccion', 'direccion.id', '=', 'negocio.id_direccion')
            ->get();
    }
}
