<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Habitaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_habitacion');
            $table->string('tipo');
            $table->float('precio');
            $table->string('estado');
            $table->string('caracteristicas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Habitaciones');
    }
};
