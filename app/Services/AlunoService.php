<?php

namespace App\Services;

use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Disciplina;

class AlunoService
{
    public function visualizarAluno($user)
    {
        switch ($user->tipo) {
            case 'aluno':
                return $this->visualizacaoAluno($user);

            case 'responsavel':
                return $this->visualizacaoResponsavel($user);

            case 'administrador':
            case 'professor':
                return $this->visualizacaoTodosAlunos($user);

            default:
                return response()->json([
                    'erro' => 'Usuário não encontrado',
                    'tipo_user' => $user->tipo,
                    'tipos_aceitos' => ['aluno', 'responsavel', 'administrador', 'professor']
                ], 403);
        }
    }

    private function visualizacaoAluno($user)
    {
        $aluno = $user->aluno;

        if (!$aluno) {
            return response()->json(['erro' => 'Não foi encontrado aluno com este registro'], 404);
        }

        $registroAluno = Aluno::with(['responsavel', 'turma'])
            ->where('id_aluno', $aluno->id_aluno)
            ->first();

        return response()->json($registroAluno);
    }

    private function visualizacaoResponsavel($user)
    {
        $responsavel = $user->responsavel;

        if (!$responsavel) {
            return response()->json(['erro' => 'Usuário não está vinculado a um responsável'], 403);
        }

        $alunos = $responsavel->alunos;

        $alunosComRelacionamentos = Aluno::with(['responsavel', 'turma'])
            ->whereIn('id_aluno', $alunos->pluck('id_aluno'))
            ->get();

        return response()->json($alunosComRelacionamentos);
    }

    private function visualizacaoTodosAlunos($user)
    {
        if ($user->tipo === 'professor') {
            $professor = $user->professor;

            if (!$professor) {
                return response()->json(['erro' => 'Acesso não autorizado - professor não encontrado'], 403);
            }

            $turmaIds = \App\Models\Turma::where('fk_id_professor', $professor->id_professor)
                ->pluck('fk_id_disciplina');

            if ($turmaIds->isEmpty()) {
                return response()->json(['mensagem' => 'Nenhuma turma associada ao professor.'], 200);
            }

            $alunos = \App\Models\Aluno::with(['responsavel', 'turma'])
                ->whereIn('fk_id_turma', $turmaIds)
                ->get();

            return response()->json($alunos);
        }

        $alunos = \App\Models\Aluno::with(['responsavel', 'turma'])->get();

        return response()->json($alunos);
    }

    public function adicionarAluno(array $dados, $user, $idTurma)
    {
        $user->load('administrador');

        if ($user->tipo !== 'administrador' || !$user->administrador) {
            return response()->json(['erro' => 'Usuário não autorizado para realizar cadastro de alunos'], 403);
        }

        $aluno = Aluno::firstOrNew([
            'fk_user_id' => $dados['fk_user_id'],
            'fk_id_turma' => $idTurma,
        ]);

        $aluno->fill($dados)->save();

        return response()->json(['mensagem' => 'Aluno cadastrado com sucesso'], 200);
    }

}
