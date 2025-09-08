<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    protected $fillable = [
        'nombre_rol',
    ];

    // ===============================
    // RELACIONES
    // ===============================

    // Relación con Consumidores (Usuarios)
    public function consumidores()
    {
        return $this->hasMany(Consumidor::class, 'rol_id');
    }

    // Relación con Vendedores
    public function vendedores()
    {
        return $this->hasMany(Vendedor::class, 'rol_id');
    }

    // Relación con Admins (si aplica)
    public function admins()
    {
        return $this->hasMany(Admin::class, 'rol_id');
    }
}
