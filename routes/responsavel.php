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

Route::middleware('auth:api','tipo:responsavel')->group(function () {
    Route::get('notas',[NotaEscolarController::class,'index']);
    Route::get('calendario-escolar',[CalendarioEscolarController::class,'index']);
    Route::get('alunos/',[AlunoController::class, 'index']);
    Route::get('responsaveis',[ResponsavelController::class, 'index']);
    Route::get('responsavel-aluno',[AlunoResponsavelController::class,'index']);
    Route::get('disciplina',[DisciplinaController::class,'index']);
    Route::get('turmas',[TurmaController::class,'index']);
    Route::get('horario-escolar',[HorarioEscolarController::class,'index']);
    Route::get('ocorrencias',[OcorrenciaController::class,'index']);
    Route::get('avaliacoes',[AvaliacaoController::class,'index']);
    Route::get('recuperacao',[ConvocacaoRecuperacaoController::class,'index']);
    Route::get('avisos',[AvisoController::class,'index']);
    Route::get('tarefas',[TarefaController::class,'index']);
});
