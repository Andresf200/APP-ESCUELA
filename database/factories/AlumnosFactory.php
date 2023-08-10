<?php

namespace Database\Factories;

use App\Models\Escuela;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumnos>
 */
class AlumnosFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'apellidos' => fake()->lastName(),
            'fecha_nacimiento' => fake()->date('Y-m-d'),
            'ciudad_natal' => fake()->city(),
            'escuela_id'  => Escuela::factory()
        ];
    }
}
