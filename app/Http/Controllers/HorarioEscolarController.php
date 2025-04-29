<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HorarioEscolar;

class HorarioEscolarController extends Controller
{
    public function index()
    {
        $horario = HorarioEscolar::with('turma','disciplina')->get();

        return response()->json($horario->map(function($horarios){
            return[
                'turma' => $horarios->turma->nome_turma ?? 'None',
                'dia_semana' => $horarios->dia_semana ?? 'None',
                'hora_inicio' => $horarios->hora_inicio ?? 'None',
                'hora_fim' => $horarios->hora_fim ?? 'None',
                'idsciplina' => $horarios->disciplina->nome ?? 'None',
            ];
        }));
    }
}
