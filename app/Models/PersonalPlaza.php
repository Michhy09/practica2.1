<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalPlaza extends Model
{
    /** @use HasFactory<\Database\Factories\PersonalPlazaFactory> */
    protected $table = 'personal_plazas'; // Nombre de la tabla pivote

    protected $fillable = [
        'personal_id', 
        'plaza_id',
        'tiponombramiento'
    ];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }

    public function plaza()
    {
        return $this->belongsTo(Plaza::class);
    }
}
