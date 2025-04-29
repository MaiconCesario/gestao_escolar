<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('alunos',[App\Http\Controllers\AlunoController::class, 'index']);
Route::get('responsaveis',[App\Http\Controllers\ResponsavelController::class, 'index']);
Route::get('responsavel-aluno',[App\Http\Controllers\AlunoResponsavelController::class,'index']);
Route::get('professor',[App\Http\Controllers\ProfessorController::class,'index']);
Route::get('disciplina',[App\Http\Controllers\DisciplinaController::class,'index']);
Route::get('turmas',[App\Http\Controllers\TurmaController::class,'index']);
Route::get('notas',[App\Http\Controllers\NotaEscolarController::class,'index']);
Route::get('horario-escolar',[App\Http\Controllers\HorarioEscolarController::class,'index']);
Route::get('calendario-escolar',[App\Http\Controllers\CalendarioEscolarController::class,'index']);
Route::get('ocorrencias',[App\Http\Controllers\OcorrenciaController::class,'index']);
Route::get('avaliacoes',[App\Http\Controllers\AvaliacaoController::class,'index']);
Route::get('recuperacao',[App\Http\Controllers\ConvocacaoRecuperacaoController::class,'index']);
Route::get('avisos',[App\Http\Controllers\AvisoController::class,'index']);
Route::get('tarefas',[App\Http\Controllers\TarefaController::class,'index']);