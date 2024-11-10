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
{
    // Definimos el arreglo de departamentos con los nombres largo, mediano y corto
    $departamentos = [
        [
            'nombre_largo' => 'Dirección General',
            'nombre_mediano' => 'Dirección',
            'nombre_corto' => 'Direccion.'
        ],
        [
            'nombre_largo' => 'Subdirección General',
            'nombre_mediano' => 'Subdirección',
            'nombre_corto' => 'Subdireccion.'
        ],
        [
            'nombre_largo' => 'Ingeniería en Sistemas Computacionales',
            'nombre_mediano' => 'Ing. Sistemas',
            'nombre_corto' => 'ISC'
        ],
        [
            'nombre_largo' => 'Ingeniería Electrónica',
            'nombre_mediano' => 'Ing. Electrónica',
            'nombre_corto' => 'IE'
        ],
        [
            'nombre_largo' => 'Ingeniería Mecánica',
            'nombre_mediano' => 'Ing. Mecánica',
            'nombre_corto' => 'IM'
        ],
        [
            'nombre_largo' => 'Ingeniería Mecatrónica',
            'nombre_mediano' => 'Ing. Mecatrónica',
            'nombre_corto' => 'IME'
        ],
        [
            'nombre_largo' => 'Contabilidad Publica',
            'nombre_mediano' => 'Contabilidad',
            'nombre_corto' => 'CP'
        ],
        [
            'nombre_largo' => 'Ingeniería en Gestión Empresarial',
            'nombre_mediano' => 'Ing. Gestión Empresarial',
            'nombre_corto' => 'IGE'
        ],
        [
            'nombre_largo' => 'Ingeniería Industrial',
            'nombre_mediano' => 'Ing. Industrial',
            'nombre_corto' => 'II'
        ],
        [
            'nombre_largo' => 'Departamento de Ciencias Básicas',
            'nombre_mediano' => 'Ciencias Básicas',
            'nombre_corto' => 'CB'
        ]
    ];

    // IDs únicos para cada departamento
    static $ids = ['D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10'];

    // Llamada al índice de cada departamento y su ID en orden
    static $index = 0;
    if ($index >= count($departamentos)) {
        throw new \Exception("Se han generado todos los departamentos y no quedan más datos.");
    }

    $deptoData = $departamentos[$index];
    $idDepto = $ids[$index];
    $index++;

    return [
        'iddepto' => $idDepto,
        'nombredepto' => $deptoData['nombre_largo'],  // Nombre largo del departamento
        'nombremediano' => $deptoData['nombre_mediano'],  // Nombre mediano del departamento
        'nombrecorto' => $deptoData['nombre_corto'],  // Nombre corto del departamento
    ];
}

    
}
