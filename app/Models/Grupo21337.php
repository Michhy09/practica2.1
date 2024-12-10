<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo21337 extends Model
{
    /** @use HasFactory<\Database\Factories\Grupo21337Factory> */
    use HasFactory;
    protected $fillable = [
        'grupo',
        'fecha',
        'descripcion',
        'max_alumnos',
        'periodo_id',
        'personal_id',
        'materia_abierta_id',
    ];

    // Relación con otros modelos
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function materiaAbierta()
    {
        return $this->belongsTo(MateriaAbierta::class);
    }
}
