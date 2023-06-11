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
        Schema::create('Huespedes', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_identificacion');
            $table->integer('identificacion');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('telefono');
            $table->string('sexo');
            $table->datetime('fecha_nacimiento');
            $table->string('nacionalidad');
            $table->string('region_direccion');
            $table->integer('telefono');
            $table->string('correo');
            $table->json('empresa');
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
        Schema::dropIfExists('Huespedes');
    }
};
