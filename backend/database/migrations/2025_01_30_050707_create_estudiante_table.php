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
        Schema::create('estudiante', function (Blueprint $table) {
            $table->unsignedInteger('id_estudiante',true);
            $table->string('nombre_cuenta', 45)->nullable();
            $table->string('correo', 45)->nullable();
            $table->string('nombre', 45)->nullable();
            $table->string('apellido_paterno', 45)->nullable();
            $table->string('apellido_materno', 45)->nullable();
            $table->string('contrasena', 45)->nullable();
            $table->primary('id_estudiante');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante');
    }
};
