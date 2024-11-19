<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoFactory> */
    use HasFactory;
    protected $fillable = ['grupo', 'descripcion', 'fecha','max_alumnos', 'periodo_id', 'personal_id'];

    // Modelo Grupo
public function periodo()
{
    return $this->belongsTo(Periodo::class, 'periodo_id', 'idPeriodo');
}

}
