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
        Schema::table('Viaje', function (Blueprint $table) {
            $table->string('conductor_id')->unique();
            $table->foreign('conductor_id')->references('dni')->on('conductors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop the keys
        Schema::table('Viaje', function (Blueprint $table) {
            $table->dropForeign('viaje_conductor_id_foreign');
        });

        // drop the actual columns
        Schema::table('Viaje', function (Blueprint $table) {
            $table->dropColumn('conductor_id');
        });
    }
};
