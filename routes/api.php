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