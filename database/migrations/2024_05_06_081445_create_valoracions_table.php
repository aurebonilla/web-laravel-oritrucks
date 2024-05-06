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
        Schema::create('valoracions', function (Blueprint $table) {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('comentario');
            $table->integer('puntuacion');
            $table->string('viaje_id');  
            $table->foreign('viaje_id')->references('identificador')->on('viajes');
            $table->string('usuario_dni');
            $table->foreign('usuario_dni')->references('dni')->on('usuarios');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valoracions');
    }
};
