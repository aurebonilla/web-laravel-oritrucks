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
            $table->int('identificador')->primary();
            $table->date('fecha');
            $table->int('duracion');
            $table->string('origen');
            $table->string('destino');
            $table->int('km');
            $table->enum('tarifa', TarifaType::cases())->default(TarifaType::Estandar); // No sé como poner aún tipo de tarifa
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
