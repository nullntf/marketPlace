<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Consumidor extends Authenticatable
{
    use Notifiable;

    protected $table = 'consumidor';

    public function getAuthIdentifierName()
    {
        return 'correo';
    }

    protected $fillable = [
        'nombre_consumidor',
        'correo',
        'telefono_consumidor',
        'password',
        'fotoPerfil_consumidor',
        'rol_id',
    ];

    protected $hidden = [
        'password',
    ];

    //==========================================
    //Relaciones
    //==========================================
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    //=====================================
    //Funciones basicas de CRUD
    //=====================================
    public static function crearUsuario(array $datos)
    {
        $datos['password'] = Hash::make($datos['password']);
        return self::create($datos);
    }

    public function actualizarUsuario(array $datos)
    {
        if (isset($datos['password'])) {
            $datos['password'] = Hash::make($datos['password']);
        }
        return $this->update($datos);
    }

    public function eliminarUsuario()
    {
        return $this->delete();
    }

    public static function listarUsuarios()
    {
        return self::all();
    }

    public static function obtenerPorId($id)
    {
        return self::find($id);
    }


    //==================================
    //Funciones de verificacion
    //==================================
    public static function buscarPorCorreo(string $correo)
    {
        return self::where('correo', $correo)->first();
    }

    public function verificarPassword(string $password)
    {
        return Hash::check($password, $this->password);
    }
}
