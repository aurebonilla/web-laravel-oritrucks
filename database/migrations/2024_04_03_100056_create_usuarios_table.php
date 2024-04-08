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
        Schema::create('usuarios', function (Blueprint $table) {
            //$table->id();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('nombre_usuario')->unique(); 
            $table->string('password');
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('dni')->primary();
            $table->string('email')->unique();
            //$table->string('dni')->unique();
            $table->string('telefono')->unique();
            $table->date('fecha_nacimiento');
            $table->string('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
