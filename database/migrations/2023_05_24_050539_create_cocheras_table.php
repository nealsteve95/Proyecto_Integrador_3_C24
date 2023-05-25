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
        Schema::create('cochera', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_huesped')->references("id")->on('huesped');
            $table->foreign('id_check_in')->references("id")->on('check_in');
            $table->string('placa');
            $table->string('color');
            $table->string('modelo');
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
        Schema::dropIfExists('cochera');
    }
};
