<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Importa rotas específicas por tipo de usuário
    require __DIR__ . '/aluno.php';
    require __DIR__ . '/professor.php';
    require __DIR__ . '/responsavel.php';
    require __DIR__ . '/administrador.php';
});


/*

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [App\Http\Controllers\AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    
    Route::middleware('tipo:aluno,responsavel, professor, administrador')->group(function () {
        Route::get('notas',[App\Http\Controllers\NotaEscolarController::class,'index']);
        Route::get('calendario-escolar',[App\Http\Controllers\CalendarioEscolarController::class,'index']);
        Route::get('alunos',[App\Http\Controllers\AlunoController::class, 'index']);
        Route::get('responsaveis',[App\Http\Controllers\ResponsavelController::class, 'index']);
        Route::get('responsavel-aluno',[App\Http\Controllers\AlunoResponsavelController::class,'index']);
        Route::get('professor',[App\Http\Controllers\ProfessorController::class,'index']);
        Route::get('disciplina',[App\Http\Controllers\DisciplinaController::class,'index']);
        Route::get('turmas',[App\Http\Controllers\TurmaController::class,'index']);
        Route::get('horario-escolar',[App\Http\Controllers\HorarioEscolarController::class,'index']);
        Route::get('calendario-escolar',[App\Http\Controllers\CalendarioEscolarController::class,'index']);
        Route::get('ocorrencias',[App\Http\Controllers\OcorrenciaController::class,'index']);
        Route::get('avaliacoes',[App\Http\Controllers\AvaliacaoController::class,'index']);
        Route::get('recuperacao',[App\Http\Controllers\ConvocacaoRecuperacaoController::class,'index']);
        Route::get('avisos',[App\Http\Controllers\AvisoController::class,'index']);
        Route::get('tarefas',[App\Http\Controllers\TarefaController::class,'index']);
      
    });


    Route::middleware('tipo:professor,administrador')->group(function () {
        Route::post('/notas', [NotaController::class, 'store']);
        Route::put('/notas/{id}', [NotaController::class, 'update']);
        
    });
});*/