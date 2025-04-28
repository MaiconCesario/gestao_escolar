<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlunoFactory extends Factory
{
    protected $model = Aluno::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'data_nascimento' => $this->faker->date(),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'email' => $this->faker->email(),
            'data_matricula' => $this->faker->date(),
        ];
    }
}
