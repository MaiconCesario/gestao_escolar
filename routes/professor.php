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

    Route::get('responsaveis',[ResponsavelController::class, 'index']);
    Route::get('responsavel-aluno',[AlunoResponsavelController::class,'index']);
    Route::get('professor',[ProfessorController::class,'index']);
    Route::get('disciplina',[DisciplinaController::class,'index']);
    Route::get('turmas',[TurmaController::class,'index']);
    Route::get('horario-escolar',[HorarioEscolarController::class,'index']);
    Route::get('calendario-escolar',[CalendarioEscolarController::class,'index']);
    Route::get('ocorrencias',[OcorrenciaController::class,'index']);
    Route::get('avaliacoes',[AvaliacaoController::class,'index']);
    Route::get('recuperacao',[ConvocacaoRecuperacaoController::class,'index']);
    Route::get('avisos',[AvisoController::class,'index']);
    Route::get('tarefas',[TarefaController::class,'index']);
    Route::get('avaliacoes', [AvaliacaoController::class, 'index']);
    
    Route::post('responsaveis',[ResponsavelController::class, 'store']);
    Route::put('responsaveis/{id}',[ResponsavelController::class, 'update']);
    Route::post('professor',[ProfessorController::class,'store']);
    Route::put('professor/{id}',[ProfessorController::class,'update']);
    Route::post('disciplina',[DisciplinaController::class,'store']);
    Route::put('disciplina/{id}',[DisciplinaController::class,'update']);
    Route::post('turmas',[TurmaController::class,'store']);
    Route::put('turmas/{id}',[TurmaController::class,'update']);
    Route::put('horario-escolar',[HorarioEscolarController::class,'store']);
    Route::post('horario-escolar/{id}',[HorarioEscolarController::class,'update']);
    Route::post('calendario-escolar',[CalendarioEscolarController::class,'store']);
    Route::put('calendario-escolar/{id}',[CalendarioEscolarController::class,'update']);
    Route::post('ocorrencias',[OcorrenciaController::class,'store']);
    Route::put('ocorrencias/{id}',[OcorrenciaController::class,'update']);
    Route::post('avaliacoes',[AvaliacaoController::class,'store']);
    Route::put('avaliacoes/{id}',[AvaliacaoController::class,'update']);
    Route::post('recuperacao',[ConvocacaoRecuperacaoController::class,'store']);
    Route::put('recuperacao/{id}',[ConvocacaoRecuperacaoController::class,'update']);
    Route::post('avisos',[AvisoController::class,'store']);
    Route::put('avisos/{id}',[AvisoController::class,'update']);
    Route::post('tarefas',[TarefaController::class,'store']);
    Route::put('tarefas/{id}',[TarefaController::class,'update']);

});
