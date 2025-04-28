<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aluno;
use App\Models\Responsavel;
use App\Models\AlunoResponsavel;

class AlunoResponsavelSeeder extends Seeder
{
    public function run()
    {
        $alunos = Aluno::all();
        $responsaveis = Responsavel::all();

        foreach ($alunos as $aluno) {
            $responsavel = $responsaveis->random(); // Pega um responsável aleatório

            AlunoResponsavel::create([
                'fk_id_aluno' => $aluno->id_aluno,
                'fk_id_responsavel' => $responsavel->id_responsavel
            ]);
        }
    }
}
