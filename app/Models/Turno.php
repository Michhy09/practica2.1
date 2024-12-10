<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    /** @use HasFactory<\Database\Factories\TurnoFactory> */
    use HasFactory;
    protected $fillable = ['fecha', 'hora', 'codigocanal', 'alumnos_id'];

    // Relación con Alumno
    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumnos_id');
    }
}
