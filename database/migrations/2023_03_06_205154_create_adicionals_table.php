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
        Schema::create('adicionals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('precio', 8, 2);
            $table->unsignedBigInteger('id_tiempo_comida');
            $table->timestamps();

            $table->foreign('id_tiempo_comida')->references('id')->on('tiempo_comidas')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adicionals');
    }
};
