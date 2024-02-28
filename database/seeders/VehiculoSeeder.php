<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VehiculoSeeder extends Seeder
{
    public function run(){

        // Borramos los datos de la tabla
        DB::table('Vehiculo')->delete();
        // Añadimos una entrada a esta tabla

        DB::table('Vehiculo')->insert([
            'matricula' => '3070 JPH',
            'tipo' => '']);//no se como poner el tipo enum furgoneta 

        DB::table('Vehiculo')->insert([
            'matricula' => '2697 CSP',
            'tipo' => '']);//no se como poner el tipo enum camion
    }
}