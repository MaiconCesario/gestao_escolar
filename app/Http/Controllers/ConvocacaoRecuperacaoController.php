<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConvocacaoRecuperacao;

class ConvocacaoRecuperacaoController extends Controller
{
    public function index()
    {
        $recuperacao = ConvocacaoRecuperacao::with('aluno','disciplina')->get();

        return response()->json($recuperacao->map(function($recuperacoes){
            return[
                'aluno' => $recuperacoes->aluno->nome ?? 'None',
                'disciplina' => $recuperacoes->disciplina->nome ?? 'None',
                'data_convocacao' => $recuperacoes->data_convocacao ?? 'None',
                
            ];
        }));
    }
}
