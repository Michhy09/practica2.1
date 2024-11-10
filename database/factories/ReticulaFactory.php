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
            'idreticula' => $this->faker->unique()->bothify('RET-###'),
            'desc' => $this->faker->sentence(5),
            'fechaVigor' => $this->faker->date(),
            'idCarrera' => Carrera::inRandomOrder()->first()->id, // Carrera aleatoria
        ];
    }
}
