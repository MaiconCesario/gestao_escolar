<?php

namespace App\Services;

use App\Models\NotaEscolar;
use App\Models\Professor;
use App\Models\Disciplina;
use Illuminate\Http\Request;

class NotaService
{
    public function visualizarNota($user)
    {
        switch($user->tipo)
        {
            case 'aluno':
                return $this->notasDoAluno($user);

            case 'responsavel':
                return $this->notasDoResponsavel($user);

            case 'professor':
            case 'admiministrador':
                return $this->todasAsNotas();

            default:
                return response()->json([
                    'error' => 'Acesso não autorizado',
                    'tipo_user' => $user->tipo,
                    'tipos_aceitos' => ['aluno', 'responsavel', 'professor', 'administrador']
                ], 403);
        }

    }

    private function notasDoAluno($user)
    {
        $aluno = $user->aluno;

        if (!$aluno) {
            return response()->json(['error' => 'Aluno não associado a este usuário.'], 403);
        }

        $notas = NotaEscolar::with('aluno', 'disciplina')
            ->where('fk_id_aluno', $aluno->id_aluno)
            ->get();

        return $this->formatarNotas($notas);
    }

    private function notasDoResponsavel($user)
    {
        $responsavel = $user->responsavel;

        $alunos = $responsavel->alunos;

        if(!$responsavel)
        {
            return response()->json(['error' => 'Responsavel não associado a este usuario'], 403);
        }

        $alunoIds = $alunos->pluck('id_aluno');

        $notas = NotaEscolar::with('aluno', 'disciplina')
                            ->whereIn('fk_id_aluno', $alunoIds)
                            ->get();

        return $this->formatarNotas($notas);
    }

    private function todasAsNotas()
    {
        $notas = NotaEscolar::with('aluno', 'disciplina')->get();
        return $this->formatarNotas($notas);
    }

    private function formatarNotas($notas)
    {
        return response()->json($notas->map(function($nota){
            return [
            'aluno' => $nota->aluno->nome ?? 'None',
            'disciplina' => $nota->disciplina->nome ?? 'None',
            'nota1' => $nota->nota1,
            'nota2' => $nota->nota2,
            'nota3' => $nota->nota3,
            'nota4' => $nota->nota4,
            ];
        }));
    }

    public function adicionarNota(array $dados, $user, $idAluno, $idDisciplina)
    {
        if($user->tipo !== 'professor')
        {
            return['status' => false, 'mensagem' => 'Apenas professores podem adicionar notas', 'code' => 403];
        }

        $professor = Professor::where('fk_user_id', $user->id)->first();

        if(!$professor)
        {
            return ['status' => false, 'mensagem' => 'Professor não encontrado para este usuário', 'code' => 404];
        }

        $disciplina = Disciplina::where('id_disciplina', $idDisciplina)
                                ->where('fk_id_professor', $professor->id_professor)
                                ->first();

        if(!$disciplina)
        {
            return ['status' => false, 'mensagem' => 'Você não tem permissão para adicionar notas desta disciplina', 'code' => 403];
        }
        
        $nota = NotaEscolar::firstOrNew([
            'fk_id_aluno' => $idAluno,
            'fk_id_disciplina' => $idDisciplina,
        ]);

        $nota->fill($dados)->save();

        return['status' => true, 'mensagem' => 'Notas inseridas com sucesso!', 'code' => 200];
    }

    public function atualizarNota(array $dados, $user, $idAluno, $idDisciplina)
    {
        if($user->tipo !== 'professor')
        {
            return['status' => false, 'mensagem' => 'Apenas professores podem editar notas', 'code' => 403];
        }

        $professor = Professor::where('fk_user_id', $user->id)->first();

        if(!$professor)
        {
            return ['status' => false, 'mensagem' => 'Professor não encontrado para este usuário', 'code' => 404];
        }

        $disciplina = Disciplina::where('id_disciplina', $idDisciplina)
                                ->where('fk_id_professor', $professor->id_professor)
                                ->first();

        if(!$disciplina)
        {
            return ['status' => false, 'mensagem' => 'Você não tem permissão para alterar as notas desta disciplina', 'code' => 403];
        }

        $nota = NotaEscolar::where('fk_id_aluno', $idAluno)
                           ->where('fk_id_disciplina', $idDisciplina)
                           ->first();
        
        if(!$nota)
        {
            return ['status' => false, 'mensagem' => 'Nota não encontrada para este aluno', 'code' => 404];
        }

        $nota->update($dados);

        return['status' => true, 'mensagem' => 'Nota(s) atualizada(s) com sucesso!', 'code' => 200];
    }
}