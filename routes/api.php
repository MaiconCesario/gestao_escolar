<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/criar-usuario',[UserController::class,'store']);

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('responsavel')->middleware(['auth:api'])->group(function () {
        require __DIR__.'/responsavel.php';
    });
    
    Route::prefix('administrador')->middleware(['auth:api'])->group(function () {
        require __DIR__.'/administrador.php';
    });
    
    Route::prefix('aluno')->middleware(['auth:api'])->group(function () {
        require __DIR__.'/aluno.php';
    });
    
    Route::prefix('professor')->middleware(['auth:api'])->group(function () {
        require __DIR__.'/professor.php';
    });
    
}); 
