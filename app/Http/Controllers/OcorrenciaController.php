<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ocorrencium;

class OcorrenciaController extends Controller
{
    public function index()
    {
        $ocorrencia = Ocorrencium::with('aluno')->get();

        return response()->json($ocorrencia->map(function($ocorrencias){
            return[
                'aluno' => $ocorrencias->aluno->nome ?? 'None',
                'data_ocorrencia' => $ocorrencias->data_ocorrencia ?? 'None',
                'data_fim' => $ocorrencias->data_fim ?? 'None',
                'descricao' => $ocorrencias->descricao ?? 'None',
            ];
        }));
    }
}
