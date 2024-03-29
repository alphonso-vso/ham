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
        Schema::create('ordens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_platillo');
            $table->unsignedBigInteger('id_estado');
            $table->integer('cantidad');
            $table->integer('adicionales');
            $table->timestamps();
            
            $table->foreign('id_usuario')->references('id')->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            
            $table->foreign('id_platillo')->references('id')->on('platillos')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordens');
    }
};
