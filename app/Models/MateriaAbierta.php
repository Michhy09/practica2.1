<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MateriaAbierta extends Model
{
    /** @use HasFactory<\Database\Factories\MateriaAbiertaFactory> */
    use HasFactory;

    protected $fillable = [
        'materia_id',
        'periodo_id',
        'carrera_id',
    ];


    // Relación con el modelo Periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    // Relación con el modelo Materia
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }
}
