<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoHorario extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoHorarioFactory> */
    use HasFactory;
    protected $fillable = ['dia', 'hora', 'grupo_id', 'lugar_id'];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }
}
