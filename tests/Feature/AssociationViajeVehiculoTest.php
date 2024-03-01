<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Vehiculo;
use App\Models\Viaje;

class AssociationViajeVehiculoTest extends TestCase
{
    /**
     * Checks the association Viaje-Vehiculo
     *
     * @return void
     */
    public function testAssociationViajeVehiculo()
    {
        $vehiculo = new Vehiculo();
        $vehiculo->matricula = '6033 DDK';
        $vehiculo->tipo = 'furgoneta';
        $vehiculo->save();
    
        $viaje = new Viaje();
        $viaje->destino = 'New York';
        $vehiculo->viajes()->save($viaje);
    
        $this->assertEquals($viaje->vehiculo->matricula, '6033 DDK');
        $this->assertEquals($vehiculo->viajes[0]->destino, 'New York');
        
        $viaje->delete();
        $vehiculo->delete();
    }
}
