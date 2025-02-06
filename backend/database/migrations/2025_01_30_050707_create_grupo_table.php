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
        Schema::create('grupo', function (Blueprint $table) {
            $table->unsignedInteger('id_grupo',true);
            $table->string('numero_grupo', 45)->nullable();
            $table->string('fecha_inicio', 45)->nullable();
            $table->string('fecha_fin', 45)->nullable();
            $table->string('fecha_grupo_inicio', 45)->nullable();
            $table->string('fecha_grupo_fin', 45)->nullable();
            $table->string('fecha_proyecto_inicio', 45)->nullable();
            $table->string('fecha_proyecto_fin', 45)->nullable();
            $table->unsignedInteger('id_docente');
            $table->foreign('id_docente')->references('id_docente')->on('docente');
            $table->primary('id_grupo');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo');
    }
};
