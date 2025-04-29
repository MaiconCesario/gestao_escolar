<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NotaEscolar;

class NotaEscolarController extends Controller
{
    public function index()
    {
        $nota_escolar = NotaEscolar::with('aluno','disciplina')->get();

        return response()->json($nota_escolar->map(function($notas){
            return[
                'aluno' => $notas->aluno->nome ?? 'None',
                'disciplina' => $notas->disciplina->nome ?? 'None',
                'nota_1' => $notas->nota1,
                'nota_2' => $notas->nota2,
                'nota_3' => $notas->nota3,
                'nota_4' => $notas->nota4,

            ];
        }));
    }
}
