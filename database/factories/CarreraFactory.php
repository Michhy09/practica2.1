<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Depto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrera>
 */
class CarreraFactory extends Factory
{
    

    public function definition(): array
    {
        return [
            'idcarrera' => $this->faker->unique()->bothify('ITPN##'),
            'nombrecarrera' => $this->faker->sentence(3),
            'nombremediano' => $this->faker->sentence(2),
            'nombrecorto' => $this->faker->regexify('[A-Z]{2,5}'),
            'depto_id' => Depto::inRandomOrder()->first()->id, // Departamento aleatorio
        ];
    }
    
    
}

