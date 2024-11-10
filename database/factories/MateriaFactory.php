<?php

namespace Database\Factories;

use App\Models\Reticula;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idmateria' => $this->faker->unique()->lexify('MATERIAL-????'),
            'nombre' => $this->faker->word,
            'nivel' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9']),
            'nombremediano' => $this->faker->word,
            'nombrecorto' => $this->faker->word,
            'modalidad' => $this->faker->randomElement(['T', 'P']), // T = Teoría, P = Práctica
            'idReticula' => Reticula::factory(), // Asociar cada materia a una retícula
        ];
    }
}
