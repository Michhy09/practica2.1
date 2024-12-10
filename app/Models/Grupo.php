<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoFactory> */
    use HasFactory;
    protected $fillable = [
        'grupo',
        'fecha',
        'descripcion',
        'max_alumnos',
        'periodo_id',
        'personal_id',
        'materia_abierta_id', // Agregar este campo
    ];

    
   public function periodo()
   {
       return $this->belongsTo(Periodo::class);
   }

   /**
    * Relación con la tabla `personals`.
    */
   public function personal()
   {
       return $this->belongsTo(Personal::class);
   }

   /**
    * Relación con la tabla `materia_abiertas`.
    */
   public function materiaAbierta()
   {
       return $this->belongsTo(MateriaAbierta::class);
   }


   public function carrera()
    {
        return $this->materiaAbierta->belongsTo(Carrera::class, 'carrera_id');
    }
}
