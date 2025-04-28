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
        Schema::table('horario_escolar', function (Blueprint $table) {
            $table->foreign(['fk_id_disciplina'], 'fk_horario_disciplina')->references(['id_disciplina'])->on('disciplina')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_id_turma'], 'fk_horario_turma')->references(['id_turma'])->on('turma')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('horario_escolar', function (Blueprint $table) {
            $table->dropForeign('fk_horario_disciplina');
            $table->dropForeign('fk_horario_turma');
        });
    }
};
