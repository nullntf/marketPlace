<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin')->truncate();

        DB::table('admin')->insert([
            [
                'nombre' => 'Super',
                'apellido' => 'Admin',
                'correo' => 'superadmin@ejemplo.com',
                'clave' => Hash::make('super123'), 
                'rol_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Admin',
                'apellido' => 'Principal',
                'correo' => 'admin@ejemplo.com',
                'clave' => Hash::make('admin123'),
                'rol_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

