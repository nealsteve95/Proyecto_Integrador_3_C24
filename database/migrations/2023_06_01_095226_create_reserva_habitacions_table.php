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
        Schema::create('reserva_habitacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_reserva');
            $table->foreign('id_reserva')->references('id')->on('reserva')->onDelete("cascade");
            $table->unsignedBigInteger('nro_habitaciones');
            $table->foreign('nro_habitaciones')->references('nro_habitacion')->on('habitacion')->onDelete("cascade");
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
        Schema::dropIfExists('reserva_habitacion');
    }
};
