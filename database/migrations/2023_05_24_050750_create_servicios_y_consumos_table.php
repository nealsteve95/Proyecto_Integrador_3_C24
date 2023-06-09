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
        Schema::create('servicios_y_consumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_check_in");
            $table->foreign('id_check_in')->references("id")->on('check_in')->onDelete("cascade");
            $table->decimal('costo', 8, 2);
            $table->string('descripcion');
            $table->string('tipo');  // enum ?
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
        Schema::dropIfExists('servicios_y_consumos');
    }
};