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
        'id_usuario',
    ];

    // ===============================
    // RELACIONES
    // ===============================

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

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
    // CONSULTA CON JOIN (con la info del nombre del vendedor y la direccion del negocio)
    // ===============================

    public static function listarNegociosConDetalles()
    {
        return self::select(
            'negocio.id',
            'negocio.descripcion',
            'negocio.telefono',
            'usuario.nombre_completo as nombre_usuario',
            'direccion.departamento',
            'direccion.municipio',
            'direccion.canton',
            'negocio.created_at'
        )
        ->join('usuario', 'usuario.id', '=', 'negocio.id_usuario')
        ->join('direccion', 'direccion.id', '=', 'negocio.id_direccion')
        ->get();
    }

}
