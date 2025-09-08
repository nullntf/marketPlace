<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';

    
     public function getAuthIdentifierName()
    {
        return 'correo'; 
    }

    protected $fillable = [
        'nombre_completo',
        'dui',
        'correo',
        'telefono',
        'password',
        'fotoPefil',
        'rol_id',
    ];

    protected $hidden = [
        'password',
        'dui'
    ];

    // Relación con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    // ===============================
    // Funciones básicas CRUD
    // ===============================

    // Crear usuario
    public static function crearUsuario(array $datos)
    {
        $datos['password'] = Hash::make($datos['password']); // encriptar contraseña
        return self::create($datos);
    }

    // Actualizar usuario
    public function actualizarUsuario(array $datos)
    {
        if (isset($datos['password'])) {
            $datos['password'] = Hash::make($datos['password']);
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

    // ===============================
    // Funciones para login
    // ===============================

    // Buscar usuario por correo
    public static function buscarPorCorreo(string $correo)
    {
        return self::where('correo', $correo)->first();
    }

    // Verificar contraseña
    public function verificarPassword(string $password)
    {
        return Hash::check($password, $this->password);
    }
}
