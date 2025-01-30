<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('proyecto_equipo', function (Blueprint $table) {
            $table->unsignedInteger('id_proyecto');
            $table->unsignedInteger('id_equipo');
            $table->date('fecha_entrega')->nullable();
            $table->foreign('id_proyecto')->references('id_proyecto')->on('proyecto');
            $table->foreign('id_equipo')->references('id_equipo')->on('equipo');
            $table->primary(['id_proyecto', 'id_equipo']);
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_equipo');
    }
};
