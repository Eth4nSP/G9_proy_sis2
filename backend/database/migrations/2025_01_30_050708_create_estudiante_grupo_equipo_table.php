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
        Schema::create('estudiante_grupo_equipo', function (Blueprint $table) {
            $table->unsignedInteger('id_grupo');
            $table->unsignedInteger('id_estudiante');
            $table->unsignedInteger('id_equipo');
            $table->foreign('id_grupo')->references('id_grupo')->on('grupo');
            $table->foreign('id_estudiante')->references('id_estudiante')->on('estudiante');
            $table->foreign('id_equipo')->references('id_equipo')->on('equipo');
            $table->primary(['id_grupo', 'id_estudiante', 'id_equipo']);
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_grupo_equipo');
    }
};
