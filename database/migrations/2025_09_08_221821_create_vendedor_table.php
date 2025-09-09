<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vendedor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_vendedor');
            $table->string('dui')->unique();
            $table->string('correo_vendedor')->unique();
            $table->string('telefono_vendedor');
            $table->string('clave');
            $table->unsignedBigInteger('rol_id');
            $table->string('fotoPerfil_vendedor')->nullable();
            $table->timestamps();

            $table->foreign('rol_id')
                ->references('id')->on('rol')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedor');
    }
};
