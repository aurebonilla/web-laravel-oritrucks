<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Conductor;
use App\Models\Viaje;

class AssociationConductorViajeTest extends TestCase
{
    /**
     * Checks the association Conductor-Viaje
     *
     * @return void
     */
    public function testAssociationConductorViaje()
    {
        $conductor = new Conductor();
        $conductor->nombre = 'John Doe';
        $conductor->dni = '12345678A';
        $conductor->save();
    
        $viaje = new Viaje();
        $viaje->destino = 'New York';
        $conductor->viajes()->save($viaje);
    
        $this->assertEquals($conductor->dni, $viaje->conductor->dni);
        $this->assertEquals($conductor->viajes[0]->destino, 'New York');
        
        $viaje->delete();
        $conductor->delete();
    }
}