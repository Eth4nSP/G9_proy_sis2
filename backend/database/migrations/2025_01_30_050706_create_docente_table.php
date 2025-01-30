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
        Schema::create('docente', function (Blueprint $table) {
            $table->unsignedInteger('id_docente',true);
            $table->string('nombre_cuenta', 45)->nullable();
            $table->string('correo', 45)->nullable();
            $table->string('nombre', 45)->nullable();
            $table->string('apellido_paterno', 45)->nullable();
            $table->string('apellido_materno', 45)->nullable();
            $table->string('contrasena', 45)->nullable();
            $table->primary('id_docente');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente');
    }
};
