<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaEscolarController;
use App\Http\Controllers\CalendarioEscolarController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\AlunoResponsavelController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\HorarioEscolarController;
use App\Http\Controllers\OcorrenciaController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\ConvocacaoRecuperacaoController;
use App\Http\Controllers\AvisoController;
use App\Http\Controllers\TarefaController;

Route::middleware('tipo:aluno')->group(function () {
    Route::get('notas{id}',[NotaEscolarController::class,'index']);
    Route::get('calendario-escolar',[CalendarioEscolarController::class,'index']);
    Route::get('alunos{id}',[AlunoController::class, 'index']);
    Route::get('responsaveis{id}',[ResponsavelController::class, 'index']);
    Route::get('responsavel-aluno{id}',[AlunoResponsavelController::class,'index']);
    Route::get('disciplina{id}',[DisciplinaController::class,'index']);
    Route::get('turmas{id}',[TurmaController::class,'index']);
    Route::get('horario-escolar{id}',[HorarioEscolarController::class,'index']);
    Route::get('ocorrencias{id}',[OcorrenciaController::class,'index']);
    Route::get('avaliacoes{id}',[AvaliacaoController::class,'index']);
    Route::get('recuperacao{id}',[ConvocacaoRecuperacaoController::class,'index']);
    Route::get('avisos',[AvisoController::class,'index']);
    Route::get('tarefas{id}',[TarefaController::class,'index']);
});
