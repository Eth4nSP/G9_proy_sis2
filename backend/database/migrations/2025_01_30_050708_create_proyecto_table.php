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
        Schema::create('proyecto', function (Blueprint $table) {
            $table->unsignedInteger('id_proyecto',true);
            $table->string('titulo_proyecto', 45)->nullable();
            $table->boolean('aceptado')->nullable();
            $table->tinyInteger('nota_proyecto', false, true)->nullable();
            $table->longText('archivo_proyecto')->nullable();
            $table->primary('id_proyecto');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto');
    }
};
