<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    /** @use HasFactory<\Database\Factories\PlazaFactory> */
    use HasFactory;
    protected $fillable =['idplaza', 'nombrePlaza' ];

    public function personals()
    {
        return $this->belongsToMany(Personal::class, 'personal_plaza', 'plaza_id', 'personal_id');
    }
}
