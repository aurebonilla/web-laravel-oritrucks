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
                $table->string('vehiculo_id');
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
        Schema::table('viajes', function (Blueprint $table) {
            if (Schema::hasColumn('viajes', 'vehiculo_id')) {
                $table->dropForeign('viajes_vehiculo_id_foreign');
                $table->dropColumn('vehiculo_id');
            }
        });
    }
};
