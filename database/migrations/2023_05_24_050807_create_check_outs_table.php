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
        Schema::create('check_out', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_check_in')->references("id")->on('check_in');
            $table->foreign('id_recepcionista')->references("id")->on('recepcionista');
            $table->string('entrega_llaves');
            $table->string('forma_pago');
            $table->string('estado_pago');
            $table->date('fecha_salida');
            $table->text('descripcion_estadia');
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
        Schema::dropIfExists('check_out');
    }
};
