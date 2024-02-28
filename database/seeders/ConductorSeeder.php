<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ConductorSeeder extends Seeder
{
    public function run() {
        // Borramos los datos de la tabla
        DB::table('Conductor')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('Conductor')->insert([
            'nombre' => 'Javier',
            'apellidos' => 'Garcia Gonzalez',
            'dni' => '87223361P',
            'fecha_nacimiento'=> '2000-02-28',
            'email'=> 'javier@garcia.com',
            'carnet'=> 'B',
            'telefono'=> '651789812',
            'foto_perfil'=> 'foto']);
        DB::table('Conductor')->insert([
            'nombre' => 'Oscar',
            'apellidos' => 'Fernandez Sempere',
            'dni' => '62532819U',
            'fecha_nacimiento'=>'1995-08-23',
            'email'=> 'oscar@fernandez.com',
            'carnet'=> 'B',
            'telefono'=> '986281192',
            'foto_perfil'=> 'foto']);
        DB::table('Conductor')->insert([
            'nombre' => 'Mario',
            'apellidos' => 'Pastor Sancho',
            'dni' => '06332250T',
            'fecha_nacimiento'=> '1998-10-02',
            'email'=> 'mario@pastor.com',
            'carnet'=> 'B',
            'telefono'=> '827551222',
            'foto_perfil'=> 'foto']);
       }
}