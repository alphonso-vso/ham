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
        Schema::create('platillo_dias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_platillo');
            $table->unsignedBigInteger('id_dia');
            $table->timestamps();
            
            $table->foreign('id_platillo')->references('id')->on('platillos')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_dia')->references('id')->on('dias')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platillo_dias');
    }
};
