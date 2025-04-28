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
        Schema::table('turma', function (Blueprint $table) {
            $table->foreign(['fk_id_disciplina'], 'fk_turma_disciplina')->references(['id_disciplina'])->on('disciplina')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_id_professor'], 'fk_turma_professor')->references(['id_professor'])->on('professor')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turma', function (Blueprint $table) {
            $table->dropForeign('fk_turma_disciplina');
            $table->dropForeign('fk_turma_professor');
        });
    }
};
