<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Responsavel>
 */
class ResponsavelFactory extends Factory
{
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'email' => $this->faker->unique()->safeEmail(), 
        ];
    }
}
