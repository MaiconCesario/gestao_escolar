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
        Schema::table('tarefa', function (Blueprint $table) {
            $table->foreign(['fk_id_diciplina'], 'fk_tarefa_disciplina')->references(['id_disciplina'])->on('disciplina')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_id_turma'], 'fk_tarefa_turma')->references(['id_turma'])->on('turma')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tarefa', function (Blueprint $table) {
            $table->dropForeign('fk_tarefa_disciplina');
            $table->dropForeign('fk_tarefa_turma');
        });
    }
};
