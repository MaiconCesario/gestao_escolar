<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacao = Avaliacao::with('disciplina','turma')->get();

        return response()->json($avaliacao->map(function($avaliacoes){
            return[
                'aluno' => $avaliacoes->disciplina->nome ?? 'None',
                'turma' => $avaliacoes->turma->nome_turma ?? 'None',
                'data_avaliacao' => $avaliacoes->data_avaliacao ?? 'None',
                'tipo_avaliacao' => $avaliacoes->tipo_avaliacao ?? 'None',
            ];
        }));
    }
}
