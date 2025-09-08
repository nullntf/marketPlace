<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categoria')->insert([
            ['nombreCategoria' => 'frutas y verduras'],
            ['nombreCategoria' => 'lacteos'],
            ['nombreCategoria' => 'carnes'],
            ['nombreCategoria' => 'granos y semillas'],
        ]);
    }
}
