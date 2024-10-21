<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periodo>
 */
class PeriodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'idPeriodo' => fake()->bothify("??##"), // ID aleatorio
        'periodo' => fake()->monthName(),
        'descorta' => fake()->word(), // Solo una palabra, así te aseguras que no exceda los 10 caracteres
        'fechaInicio' => $inicio = fake()->dateTimeBetween('now', '+1 year'), // Fecha de inicio
        'fechaFin' => fake()->dateTimeBetween($inicio, '+2 years'), // Fecha de fin

        ];

    }
}
