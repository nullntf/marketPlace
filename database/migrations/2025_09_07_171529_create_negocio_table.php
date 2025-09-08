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
        Schema::create('negocio', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->integer('telefono');
            $table->unsignedBigInteger('id_direccion');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

             $table->foreign('id_direccion')
                  ->references('id')->on('direccion')
                  ->onDelete('restrict');

             $table->foreign('id_usuario')
                  ->references('id')->on('usuario')
                  ->onDelete('restrict');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negocio');
    }
};
