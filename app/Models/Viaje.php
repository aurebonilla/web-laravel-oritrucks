<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaje extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'identificador';

    protected $fillable = [
        'identificador',
        'fecha',
        'duracion',
        'origen',
        'destino',
        'km',
        'tarifa', // No sé como poner aún tipo de tarifa
        'vehiculo_id',
        'conductor_id',
    ];
   
    public function vehiculo()
    {
        // Viaje tiene la clave ajena 'vehiculo_id'
        return $this->belongsTo(Vehiculo::class);
    }

    public function conductor()
    {
        // Viaje tiene la clave ajena 'conductor_id'
        return $this->belongsTo(Conductor::class);
    }
       
}
