<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('tipo', ['aluno', 'responsavel', 'professor', 'administrador'])->after('password');
        });        
        
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
