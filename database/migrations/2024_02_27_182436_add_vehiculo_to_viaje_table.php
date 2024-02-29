<?php

use App\Enums\TarifaType;
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
            if (!Schema::hasColumn('viajes', 'vehiculo_id')) {
                $table->string('vehiculo_id')->unique();
                $table->foreign('vehiculo_id')->references('matricula')->on('vehiculos');
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
        // drop the keys
        Schema::table('viajes', function (Blueprint $table) {
            $table->dropForeign('viaje_vehiculo_id_foreign');
        });

        // drop the actual columns
        Schema::table('viajes', function (Blueprint $table) {
            $table->dropColumn('vehiculo_id');
        });
    }
};
