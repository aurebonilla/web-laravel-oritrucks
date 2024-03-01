<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Vehiculo;
use App\Models\Viaje;

class AssociationViajeVehiculoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Checks the association Viaje-Vehiculo
     *
     * @return void
     */
    public function testAssociationViajeVehiculo()
    {
        $vehiculo = new Vehiculo;
        $vehiculo->matricula = '6033 DDK';
        $vehiculo->save();
        
        $viaje = new Viaje;
        $viaje->destino = 'Paris';
        $viaje->origen = 'Madrid';
        $viaje->km = 500; 
        $viaje->identificador = '00000001'; 
        $viaje->conductor_id = 1; 
        $viaje->vehiculo_id = $vehiculo->matricula; // Usa la matricula del vehículo que acabas de crear
        $viaje->vehiculo_matricula = '6033 DDK'; 
        $viaje->fecha = '2024-03-01'; 
        $viaje->duracion = 50; 
        $viaje->conductor_dni = '12345678A'; 
        $viaje->save();
    }
}
