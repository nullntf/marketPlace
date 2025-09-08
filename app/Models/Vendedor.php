<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Vendedor extends Authenticatable
{
    use Notifiable;

    protected $table = 'vendedor';

    public function getAuthIdentifierName()
    {
        return 'correo_vendedor';
    }

    protected $fillable = [
        'nombre_vendedor',
        'dui',
        'correo_vendedor',
        'telefono_vendedor',
        'clave',
        'fotoPerfil_vendedor',
        'rol_id',
    ];

    protected $hidden = [
        'clave',
    ];

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    // ===============================
    // Funciones básicas CRUD
    // ===============================

    // Crear vendedor
    public static function crearVendedor(array $datos)
    {
        $datos['clave'] = Hash::make($datos['clave']);
        return self::create($datos);
    }

    // Actualizar vendedor
    public function actualizarVendedor(array $datos)
    {
        if (isset($datos['clave'])) {
            $datos['clave'] = Hash::make($datos['clave']);
        }
        return $this->update($datos);
    }

    // Eliminar vendedor
    public function eliminarVendedor()
    {
        return $this->delete();
    }

    // Obtener todos los vendedores
    public static function listarVendedores()
    {
        return self::all();
    }

    // Obtener vendedor por ID
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    // ===============================
    // Funciones para login
    // ===============================

    // Buscar vendedor por correo
    public static function buscarPorCorreo(string $correo)
    {
        return self::where('correo_vendedor', $correo)->first();
    }

    // Verificar contraseña
    public function verificarPassword(string $password)
    {
        return Hash::check($password, $this->clave);
    }
}
