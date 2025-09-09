<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Consumidor extends Authenticatable
{
    use Notifiable;

    protected $table = 'consumidor';

    // Indicamos que el campo de autenticación es 'correo_consumidor'
    public function getAuthIdentifierName()
    {
        return 'correo_consumidor';
    }

    protected $fillable = [
        'nombre_consumidor',
        'correo_consumidor',
        'telefono_consumidor',
        'clave',
        'fotoPerfil_consumidor', // ¡Corregido! Estaba mal escrito antes
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


    public function getAuthPassword()
{
    return $this->clave;
}

    // ===============================
    // Funciones básicas CRUD
    // ===============================

    // Crear usuario
    public static function crearUsuario(array $datos)
    {
        $datos['clave'] = Hash::make($datos['clave']); // encriptar contraseña
        return self::create($datos);
    }

    // Actualizar usuario
    public function actualizarUsuario(array $datos)
    {
        if (isset($datos['clave'])) {
            $datos['clave'] = Hash::make($datos['clave']);
        }
        return $this->update($datos);
    }

    // Eliminar usuario
    public function eliminarUsuario()
    {
        return $this->delete();
    }

    // Obtener todos los usuarios
    public static function listarUsuarios()
    {
        return self::all();
    }

    // Obtener consumidor por ID
    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    // ===============================
    // Funciones para login
    // ===============================

    // Buscar usuario por correo
    public static function buscarPorCorreo(string $correo)
    {
        return self::where('correo_consumidor', $correo)->first();
    }

    // Verificar contraseña
    public function verificarPassword(string $password)
    {
        return Hash::check($password, $this->clave);
    }
}
