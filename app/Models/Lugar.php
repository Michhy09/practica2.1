<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    /** @use HasFactory<\Database\Factories\LugarFactory> */
    use HasFactory;
    protected $fillable = [
        'nombrelugar',
        'nombrecorto',
        'edificio_id',
    ];

    /**
     * Relación con el modelo Edificio.
     * Un lugar pertenece a un edificio.
     */
    public function edificio()
    {
        return $this->belongsTo(Edificio::class);
    }
}
