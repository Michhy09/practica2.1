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
            'idmateria' => $this->faker->unique()->word(3), // Genera un id único
            'nombre' => $this->faker->sentence(3), // Genera un nombre de materia
            'nivel' => $this->faker->randomElement(['1', '2', '3']), // Niveles posibles
            'nombremediano' => $this->faker->word(10), // Nombre mediano
            'nombrecorto' => $this->faker->word(5), // Nombre corto
            'modalidad' => $this->faker->randomElement(['P', 'V', 'H']), // Modalidad
            'idReticula' => Reticula::factory(), 
        ];
    }
}
