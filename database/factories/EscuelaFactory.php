<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Escuela>
 */
class EscuelaFactory extends Factory
{

    public function definition()
    {
        return [
            'nombre' => fake()->sentence(1),
            'direccion' => fake()->address(),
            'path_logotipo' => fake()->filePath(),
            'name_logotipo' => 'imagen.jpg',
            'email' => fake()->email(),
            'telefono' => '3111111111',
            'pagina_web' => 'example.com',
        ];
    }
}
