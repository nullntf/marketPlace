<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    

    protected $table = 'rol'; 

    protected $fillable = [
        'nombre_rol',
    ];

    // Relación con usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'rol_id');
    }

    // Relación con admins
    public function admins()
    {
        return $this->hasMany(Admin::class, 'rol_id');
    }
}
