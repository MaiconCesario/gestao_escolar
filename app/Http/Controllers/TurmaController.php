<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
    public function index()
    {
        $turma = Turma::with('disciplina','professor')->get();
        
        return response()->json($turma->map(function($turmas){
            return[
                'nome_turma' => $turmas->nome_turma ?? 'None',
                'disciplina' => $turmas->disciplina->nome ?? 'None',
                'professor' => $turmas->professor->nome ?? 'None',
            ];
        }));
    }
}
