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
        Schema::create('check_in', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_huesped')->references("id")->on('huesped');
            $table->foreign('nro_habitacion')->references("nro_habitacion")->on('habitacion');
            $table->foreign('id_recepcionista')->references("id")->on('recepcionista');
            $table->string('tipo_reserva');
            $table->integer('paxs');
            $table->integer('cant_dias');
            $table->string('motivo_viaje');
            $table->date('fecha_ingreso');
            $table->string('nota_adicional')->nullable();
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
        Schema::dropIfExists('check_in');
    }
};
