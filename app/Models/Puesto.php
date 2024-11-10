<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $fillable =['idpuesto', 'nombre', 'tipo' ];

    public function personals()
    {
        return $this->hasMany(Personal::class); // Un puesto tiene muchos empleados
    }

}
