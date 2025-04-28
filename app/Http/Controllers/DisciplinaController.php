<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disciplina;

class DisciplinaController extends Controller
{
    public function index()
    {
        $disciplina = Disciplina::with('professor')->get();

        return response()->json($disciplina->map(function($disciplinas){
            return[
            'disciplina' => $disciplinas->nome ?? 'None',
            'descricao' => $disciplinas->descricao ?? 'None',
            'nome_professor' => $disciplinas->professor->nome ?? 'None',
            ];
        }));
    }
}
