<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EnderecoAluno;
use App\Models\Aluno;

class EnderecoAlunoSeeder extends Seeder
{
    public function run()
    {
        $alunos = Aluno::all();

        foreach ($alunos as $aluno) {
            EnderecoAluno::factory()->create([
                'fk_id_aluno' => $aluno->id_aluno
            ]);
        }
    }
}
