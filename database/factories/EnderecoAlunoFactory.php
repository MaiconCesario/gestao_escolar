<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Aluno;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EnderecoAluno>
 */
class EnderecoAlunoFactory extends Factory
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
            'fk_id_aluno' => Aluno::inRandomOrder()->first()->id_aluno,
        ];
    }
}
