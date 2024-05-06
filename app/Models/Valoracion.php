<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model
{
    use HasFactory;

    protected $fillable = [
        'puntuacion',
        'comentario',
        'viaje_id',
        'usuario_dni',
    ];

    public function viaje()
    {
        // Valoracion tiene la clave ajena 'viaje_id'
        return $this->belongsTo(Viaje::class);
    }

    public function usuario()
    {
        // Valoracion tiene la clave ajena 'usuario_dni'
        return $this->belongsTo(Usuario::class);
    }
}
