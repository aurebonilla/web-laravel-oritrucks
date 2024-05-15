<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class UsuarioSeeder extends Seeder
{
    public function run() {
        // Borramos los datos de la tabla
        DB::table('usuarios')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('usuarios')->insert([
            'nombre_usuario' => 'usuario1',
            'password' => Hash::make('password'),
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'dni' => '12345678A',
            'email' => 'usuario1@example.com',
            'telefono' => '123456789',
            'fecha_nacimiento' => '2000-01-01',
            'direccion' => 'Calle Ejemplo, 1',
            'rol' => 'cliente',
        ]);
        // Añadimos otro usuario cliente
        DB::table('usuarios')->insert([
            'nombre_usuario' => 'usuario2',
            'password' => Hash::make('password'),
            'nombre' => 'Nombre2',
            'apellidos' => 'Apellidos2',
            'dni' => '23456789B',
            'email' => 'usuario2@example.com',
            'telefono' => '234567890',
            'fecha_nacimiento' => '2001-02-02',
            'direccion' => 'Calle Ejemplo, 2',
            'rol' => 'admin',
        ]);
    }
}