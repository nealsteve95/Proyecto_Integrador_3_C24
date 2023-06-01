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
        Schema::create('huesped', function (Blueprint $table) {
            $table->id();
            $table->integer('id_huesped');
            $table->string('tipo_identificacion');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('sexo');
            $table->date('fecha_nacimiento');
            $table->string('nacionalidad');
            $table->string('region_direccion');
            $table->string('telefono');
            $table->string('correo');
            $table->string('contraseña');
            $table->json('id_empresa');
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
        Schema::dropIfExists('huesped');
    }
};
