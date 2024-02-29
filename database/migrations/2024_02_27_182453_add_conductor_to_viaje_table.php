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
        Schema::table('viajes', function (Blueprint $table) {
            if (!Schema::hasColumn('viajes', 'conductor_id')) {
                $table->string('conductor_id')->unique();
                $table->foreign('conductor_id')->references('dni')->on('conductors');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viajes', function (Blueprint $table) {
            if (Schema::hasColumn('viajes', 'conductor_id')) {
                $table->dropForeign(['conductor_id']);
                $table->dropColumn('conductor_id');
            }
        });
    }
};
