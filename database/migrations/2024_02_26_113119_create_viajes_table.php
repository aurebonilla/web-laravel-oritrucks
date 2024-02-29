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
        Schema::create('viajes', function (Blueprint $table) {
            $table->integer('identificador')->primary();
            $table->date('fecha');
            $table->integer('duracion');
            $table->string('origen');
            $table->string('destino');
            $table->integer('km');
            $table->string('tarifa'); // No sé como poner aún tipo de tarifa
            $table->string('vehiculo_id');
            $table->string('conductor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viajes');
    }
};
