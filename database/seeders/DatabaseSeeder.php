<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Vehiculo;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Llamamos a otro fichero de semillas
        $this->call( ConductorSeeder ::class );
        // Mostramos información por consola
        $this->command->info('Conductor seeded! ;)' );

        $this->call(VehiculoSeeder ::class);
        $this->command->info('Vehiculo seeded! ;)');

        $this->call(UsuarioSeeder ::class);
        $this->command->info('Usuario x dios seeded! ;)');
    }
}
