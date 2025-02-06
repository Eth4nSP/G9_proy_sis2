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
        Schema::create('equipo', function (Blueprint $table) {
            $table->unsignedInteger('id_equipo',true);
            $table->string('nombre_equipo', 45)->nullable();
            $table->boolean('publicada')->nullable();
            $table->primary('id_equipo');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
