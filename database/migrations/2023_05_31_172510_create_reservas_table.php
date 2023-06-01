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
        Schema::create('reserva', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_huesped')->nullable();
            $table->foreign('id_huesped')->references('id_huesped')->on('huesped')->onDelete("not null");
            $table->date('fecha_reserva');
            $table->integer('cant_dias');
            $table->integer('nro_acompañantes');
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
        Schema::dropIfExists('reserva');
    }
};
