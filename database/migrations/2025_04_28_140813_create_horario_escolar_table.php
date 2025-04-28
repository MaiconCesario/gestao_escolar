<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horario_escolar', function (Blueprint $table) {
            $table->bigInteger('id_horario', true);
            $table->bigInteger('fk_id_turma')->nullable()->index('fk_horario_turma');
            $table->enum('dia_semana', ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'])->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fim')->nullable();
            $table->bigInteger('fk_id_disciplina')->nullable()->index('fk_horario_disciplina');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horario_escolar');
    }
};
