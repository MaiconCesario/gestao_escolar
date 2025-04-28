<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlunoResponsavel;

class AlunoResponsavelController extends Controller
{
    public function index()
    {
        $alunosResposnaveis = AlunoResponsavel::with('aluno','responsavel')->get();

        return response()->json($alunosResposnaveis->map(function($alunoResposanvel){
            return [
                'aluno' => $alunoResposanvel->aluno->nome,
                'responsavel' => $alunoResposanvel->responsavel->nome,
            ];
        }));
    }
}
