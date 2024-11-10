<?php

namespace Database\Seeders;

use App\Models\Plaza;
use App\Models\Personal;
use App\Models\PersonalPlaza;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalPlazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todas las plazas y personas
        $plazas = Plaza::all();
        $personas = Personal::all();

        // Tomamos solo las primeras 15 personas (o las 15 primeras que existan)
        $personas = $personas->take(14); 

        // Asegurarnos de que tenemos suficientes personas para asignar
        if ($personas->count() < 14) {
            echo "No hay suficientes personas para asignar plazas.\n";
            return;
        }

        // Asignar una plaza aleatoria a cada persona
        foreach ($personas as $persona) {
            // Elegir una plaza aleatoria de las 5 disponibles
            $plaza = $plazas->random(); // Escoge una plaza al azar

            // Insertar la relación en la tabla 'personalplaza'
            PersonalPlaza::create([
                'tiponombramiento' => 1, // Tipo de nombramiento
                'plaza_id' => $plaza->id, // Asocia la plaza aleatoria
                'personal_id' => $persona->id, // Asocia la persona
            ]);


            
            }

}
}