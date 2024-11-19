<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    /** @use HasFactory<\Database\Factories\PersonalFactory> */
    use HasFactory;

    protected $fillable = [
        'RFC',
        'nombres',
        'apellidop',
        'apellidom',
        'licenciatura',
        'lictit',
        'especializacion',
        'esptit',
        'maestria',
        'maetit',
        'doctorado',
        'doctit',
        'fechaingsep',
        'fechaingins',
        'depto_id',
        'puesto_id',
    ];
    

   // En el modelo Personal
   public function depto()
   {
       return $this->belongsTo(Depto::class, 'depto_id', 'iddepto');
   }
   

public function puesto()
{
    return $this->belongsTo(Puesto::class);
}

public function personalPlazas()
    {
        return $this->hasMany(PersonalPlaza::class);  // This tells Eloquent that a Personal can have many PersonalPlaza records
    }

    
    // Relación muchos a muchos con el modelo Plaza a través de la tabla intermedia
    public function plazas()
    {
        return $this->belongsToMany(Plaza::class);
    }
      


}
