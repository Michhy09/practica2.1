<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Depto>
 */
class DeptoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $titulo = fake()->unique()->jobTitle();

        return [
            'iddepto' => fake()->unique()->bothify('?#'), // Genera un ID único con prefijo
            'nombredepto' => $titulo , // Nombre del departamento
            'nombremediano' => fake()->unique()->lexify(str_repeat("?", 15)), // Nombre mediano
            'nombrecorto' => substr($titulo,0,5 ), // Nombre corto, hasta 5 caracteres
        ];
    }
}
