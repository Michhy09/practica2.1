<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoHorario21337 extends Model
{
    /** @use HasFactory<\Database\Factories\GrupoHorario21337Factory> */
    use HasFactory;
    protected $fillable = ['dia', 'hora', 'grupo_id', 'lugar_id'];

    // Relación con la tabla grupos
    public function grupo()
    {
        return $this->belongsTo(Grupo21337::class);
    }

    // Relación con la tabla lugares
    public function lugar()
    {
        return $this->belongsTo(Lugar::class);
    }
}
