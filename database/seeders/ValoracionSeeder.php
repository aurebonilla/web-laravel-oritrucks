<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Valoracion;

class ValoracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valoracions')->delete();
        DB::table('valoracions')->insert([
            'id' => 1,
            'puntuacion' => 5,
            'comentario' => 'Excelente viaje',
            'viaje_id' => 'VJ001',
            'usuario_dni' => '12345678A',
        ]);
    }
}