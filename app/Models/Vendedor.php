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
        return 'correo';
    }

    protected $fillable = [
        'nombre_vendedor',
        'dui',
        'correo',
        'telefono_vendedor',
        'password',
        'fotoPerfil_vendedor',
        'rol_id',
    ];

    protected $hidden = [
        'password',
    ];

    //============================================
    //Relaciones
    //============================================
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }

    //=========================================
    //Funciones basicas del crud
    //=========================================
    public static function crearVendedor(array $datos)
    {
        $datos['password'] = Hash::make($datos['password']);
        return self::create($datos);
    }

    public function actualizarVendedor(array $datos)
    {
        if (isset($datos['password'])) {
            $datos['password'] = Hash::make($datos['password']);
        }
        return $this->update($datos);
    }

    public function eliminarVendedor()
    {
        return $this->delete();
    }

    public static function listarVendedores()
    {
        return self::all();
    }

    public static function obtenerPorId($id)
    {
        return self::find($id);
    }

    //========================================
    //Funciones de verificacion
    //========================================
    public static function buscarPorCorreo(string $correo)
    {
        return self::where('correo', $correo)->first();
    }

    public function verificarPassword(string $password)
    {
        return Hash::check($password, $this->password);
    }
}
