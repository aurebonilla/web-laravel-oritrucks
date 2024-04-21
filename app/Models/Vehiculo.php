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
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'matricula',
        'tipo',
    ];

    public function viajes()
    {
        return $this->hasMany(Viaje::class, 'vehiculo_id', 'matricula');
    }
}
