<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'matricula';
    protected $keyType = 'string';

    protected $fillable = [
        'matricula',
        'tipo', // No sé como poner aún tipo de vehículo
    ];

    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}
