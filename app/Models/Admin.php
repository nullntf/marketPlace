<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin'; // Nombre de la tabla

    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'clave',
        'rol_id',
    ];

    protected $hidden = [
        'clave', // ocultar la clave al serializar
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

    // Crear admin
    public static function crearAdmin(array $datos)
    {
        $datos['clave'] = Hash::make($datos['clave']); // encriptar clave
        return self::create($datos);
    }

    // Actualizar admin
    public function actualizarAdmin(array $datos)
    {
        if (isset($datos['clave'])) {
            $datos['clave'] = Hash::make($datos['clave']);
        }
        return $this->update($datos);
    }

    // Eliminar admin
    public function eliminarAdmin()
    {
        return $this->delete();
    }

    // Obtener todos los admins
    public static function listarAdmins()
    {
        return self::all();
    }

    // ===============================
    // Funciones para login
    // ===============================

    // Buscar admin por correo
    public static function buscarPorCorreo(string $correo)
    {
        return self::where('correo', $correo)->first();
    }

    // Verificar clave
    public function verificarClave(string $clave)
    {
        return Hash::check($clave, $this->clave);
    }

   
}

