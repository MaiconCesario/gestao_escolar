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
        Schema::table('avaliacao', function (Blueprint $table) {
            $table->foreign(['fk_id_disciplina'], 'fk_avaliacao_disciplina')->references(['id_disciplina'])->on('disciplina')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_id_turma'], 'fk_avaliacao_turma')->references(['id_turma'])->on('turma')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avaliacao', function (Blueprint $table) {
            $table->dropForeign('fk_avaliacao_disciplina');
            $table->dropForeign('fk_avaliacao_turma');
        });
    }
};
