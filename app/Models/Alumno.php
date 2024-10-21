<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alumno extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellidop', 'apellidom', 'noctrl', 'sexo', 'carrera_id'];

    public function carrera():BelongsTo{
        return $this ->belongsTo(Carrera::class);
    }
}
