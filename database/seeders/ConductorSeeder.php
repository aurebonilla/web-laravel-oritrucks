<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ConductorSeeder extends Seeder
{
    public function run() {
        // Borramos los datos de la tabla
        DB::table('conductors')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('conductors')->insert([
            'nombre' => 'Javier',
            'apellidos' => 'Garcia Gonzalez',
            'dni' => '87223361P',
            'fecha_nacimiento'=> '2000-02-28',
            'email'=> 'javier@garcia.com',
            'carnet'=> 'B',
            'telefono'=> '651789812',
            //'foto_perfil'=> 'G01-01/storage/app/public/fotos/conductor1.png'
        ]);

        //$imagen1 = public_path('G01-01/storage/app/public/fotos/conductor1.png');
        //$nombreArchivo1 = 'conductor1.png';
       // Storage::put('public/fotos/'.$nombreArchivo1,file_get_contents($imagen1));

        DB::table('conductors')->insert([
            'nombre' => 'Oscar',
            'apellidos' => 'Fernandez Sempere',
            'dni' => '62532819U',
            'fecha_nacimiento'=>'1995-08-23',
            'email'=> 'oscar@fernandez.com',
            'carnet'=> 'B',
            'telefono'=> '986281192',
            //'foto_perfil'=> 'G01-01/storage/app/public/fotos/conductor2.png'
            ]);

        //$imagen2 = public_path('G01-01/storage/app/public/fotos/conductor2.png');
        //$nombreArchivo2 = 'conductor2.png';
       // Storage::put('public/fotos/'.$nombreArchivo2,file_get_contents($imagen2));

        DB::table('conductors')->insert([
            'nombre' => 'Mario',
            'apellidos' => 'Pastor Sancho',
            'dni' => '06332250T',
            'fecha_nacimiento'=> '1998-10-02',
            'email'=> 'mario@pastor.com',
            'carnet'=> 'B',
            'telefono'=> '827551222',
        //    'foto_perfil'=> 'G01-01/storage/app/public/fotos/conductor3.png'
        ]);
        
         //   $imagen3 = public_path('G01-01/storage/app/public/fotos/conductor3.png');
         //   $nombreArchivo3 = 'conductor3.png';
        //  Storage::put('public/fotos/'.$nombreArchivo3,file_get_contents($imagen3));
       }
}