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
            $table->unsignedBigInteger('id_reserva')->nullable();
            $table->foreign('id_reserva')->references("id")->on('reserva')->onDelete("not null");
            $table->unsignedBigInteger('id_administrador')->nullable();
            $table->foreign('id_administrador')->references("id")->on('administrador')->onDelete("not null");
            $table->string('tipo_reserva');
            $table->integer('paxs');
            $table->string('motivo_viaje');
            $table->date('fecha_ingreso');
            $table->date('hora_ingreso');
            $table->text('nota_adicional');
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
