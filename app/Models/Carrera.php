<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrera extends Model
{
    use HasFactory;
    protected $fillable = ['idcarrera', 'nombrecarrera', 'nombrecorto', 'nombremediano', 'depto_id'];

    public function alumnos():HasMany{
        return $this ->hasMany(Alumno::class);
    }
   

   

    public function reticulas()
    {
        return $this->hasMany(Reticula::class, 'idCarrera');
    }

    public function depto()
{
    return $this->belongsTo(Depto::class, 'depto_id', 'iddepto');
}


}
