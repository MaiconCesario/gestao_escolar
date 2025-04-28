<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Responsavel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnderecoResponsavel>
 */
class EnderecoResponsavelFactory extends Factory
{
    public function definition()
    {
        return [
            'logradouro' => $this->faker->streetName(),
            'numero' => $this->faker->buildingNumber(),
            'complemento' => $this->faker->secondaryAddress(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'estado' => $this->faker->stateAbbr(),
            'fk_id_responsavel' => Responsavel::inRandomOrder()->first()->id_responsavel,
        ];
    }
}
