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
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProduc');
            $table->decimal('precio', 10, 2);
            $table->string('descripcionProduc');
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('id_negocio');
            $table->timestamps();

             $table->foreign('id_negocio')
                  ->references('id')->on('negocio')
                  ->onDelete('restrict');

            $table->foreign('id_categoria')
                ->references('id')->on('categoria')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
