<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaEscolarController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\CalendarioEscolarController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\AlunoResponsavelController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\HorarioEscolarController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\ConvocacaoRecuperacaoController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\TarefaController;


Route::middleware('auth:api','tipo:professor')->group(function () {
    Route::get('notas',[NotaEscolarController::class,'index']);
    Route::post('notas/{idAluno}/{idDisciplina}', [NotaEscolarController::class, 'store']);
    Route::put('notas/{idAluno}/{idDisciplina}', [NotaEscolarController::class, 'update']);
    Route::patch('notas/aluno/{idAluno}/{idDisciplina}', [NotaEscolarController::class, 'updateParcial']);

    Route::get('calendario-escolar',[CalendarioEscolarController::class,'index']);
    Route::post('calendario-escolar',[CalendarioEscolarController::class,'store']);
    Route::put('calendario-escolar',[CalendarioEscolarController::class,'update']);

    Route::get('alunos',[AlunoController::class, 'index']);
    Route::post('alunos',[AlunoController::class, 'post']);
    Route::put('alunos/{idAluno}',[AlunoController::class, 'update']);

});
