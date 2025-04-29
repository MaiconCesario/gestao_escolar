<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefa = Tarefa::with('disciplina','turma')->get();

        return response()->json($tarefa->map(function($tarefas){
            return[
            'disciplina' => $tarefas->disciplina->nome ?? 'None',
            'data_entrega' => $tarefas->data_entrega ?? 'None',
            'turma' => $tarefas->turma->nome ?? 'None',
            ];
        }));
    }
}
