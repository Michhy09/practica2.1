<?php

namespace Database\Factories;

use App\Models\Carrera;
use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reticula>
 */
class ReticulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idmateria' => fake()->regexify('[A-Z]{3}[0-9]{3}'), // Genera algo como MAT101
            'nivel' => fake()->randomElement(['1', '2', '3']), // Nivel entre 1, 2 o 3
            'nombremediano' => fake()->words(2), // Nombre de materia
            'nombrecorto' => fake()->word(), // Nombre corto
            'modalidad' => fake()->randomElement(['P', 'V', 'H']),
            "idReticula"=>Reticula::factory()
        ];
    }
}
