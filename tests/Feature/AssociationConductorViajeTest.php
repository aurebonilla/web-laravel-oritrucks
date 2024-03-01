<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Conductor;
use App\Models\Viaje;

class AssociationConductorViajeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Checks the association Conductor-Viaje
     *
     * @return void
     */
    public function testAssociationConductorViaje()
    {
        $conductor = new Conductor();
        $conductor->nombre = 'Aurelio';
        $conductor->dni = '12345678A';
        $conductor->apellidos = 'Bonilla'; 
        $conductor->fecha_nacimiento = '2003-03-10';
        $conductor->email = 'aurelio@bonil.la';
        $conductor->carnet = 'B';
        $conductor->telefono = 666777888;
        $conductor->save();
    
        $viaje = new Viaje();
        $viaje->destino = 'Paris';
        $viaje->origen = 'Madrid';
        $viaje->km = 500; 
        $viaje->identificador = '00000001'; 
        $viaje->conductor_id = 1; 
        $viaje->vehiculo_id = 1; 
        $viaje->vehiculo_matricula = '6033 DDK'; 
        $viaje->fecha='2024-03-01'; 
        $viaje->duracion=50;       
        $viaje->tarifa = 'estandar';
        $viaje->conductor_dni = '12345678A';
        $viaje->save();
    
        $this->assertEquals($conductor->dni, $viaje->conductor->dni);
        $this->assertEquals($conductor->viajes[0]->destino, 'Paris');
        
        $viaje->delete();
        $conductor->delete();
    }
}