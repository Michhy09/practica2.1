<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /** @use HasFactory<\Database\Factories\MateriaFactory> */
    use HasFactory;
    protected $fillable = [
        'idmateria',
        'nivel',
        'nombre',
        'nombremediano',
        'nombrecorto',
        'modalidad',
        'idReticula',
        
    ];

    public function reticula()
    {
        return $this->belongsTo(Reticula::class, 'idReticula'); // 'idReticula' es la clave foránea
    }
}
