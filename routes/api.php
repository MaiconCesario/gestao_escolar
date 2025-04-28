<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('alunos',[App\Http\Controllers\AlunoController::class, 'index']);
Route::get('responsaveis',[App\Http\Controllers\ResponsavelController::class, 'index']);
Route::get('responsavel-aluno',[App\Http\Controllers\AlunoResponsavelController::class,'index']);
Route::get('professor',[App\Http\Controllers\ProfessorController::class,'index']);
Route::get('disciplina',[App\Http\Controllers\DisciplinaController::class,'index']);