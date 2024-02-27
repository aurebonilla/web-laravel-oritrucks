<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'dni';

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'fecha_nacimiento',
        'email',
        'carnet',
        'telefono',
        'foto_perfil',
    ];
    
    public function viajes()
    {
        return $this->hasMany(Viaje::class);
    }
}
