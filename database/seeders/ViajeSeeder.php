<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Viaje;
use App\Models\Conductor;
use App\Models\Cliente;
use App\Models\Vehiculo;

class ViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viajes')->delete();
        DB::table('viajes')->insert([
            'identificador' => 'VJ001',
            'fecha' => 10,
            'duracion' => '5',
            'origen' => 'Madrid',
            'destino' => 'Francia',
            'km' => 100,
            'precio' => 100.00,
            'tarifa' => 'estandar',
            'vehiculo_id' => '0962 KLM',
            'conductor_id' => '06332250T',
            'cliente_dni' => '12345678A',
        ]);
    }
}