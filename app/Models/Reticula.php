<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reticula extends Model
{
    /** @use HasFactory<\Database\Factories\ReticulaFactory> */
    use HasFactory;

    protected $fillable = ['idreticula', 'desc', 'fechaVigor', 'idCarrera'];


    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'idCarrera');
    }

    public function materias()
    {
        return $this->hasMany(Materia::class, 'idReticula'); // 'idReticula' es la clave foránea
    }
}
