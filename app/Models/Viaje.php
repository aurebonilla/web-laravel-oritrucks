<?php

namespace App\Models;

use App\Enums\TarifaType;
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
    protected $keyType = 'string';


    protected $fillable = [
        'identificador',
        'fecha',
        'duracion',
        'origen',
        'destino',
        'km',
        'tarifa', // No sé como poner aún tipo de tarifa
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
    
    public function cliente()
    {
        // Viaje tiene la clave ajena 'cliente_id'
        return $this->belongsTo(Cliente::class);
    }
}
