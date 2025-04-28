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
        Schema::table('nota_escolar', function (Blueprint $table) {
            $table->foreign(['fk_id_aluno'], 'fk_nota_aluno')->references(['id_aluno'])->on('aluno')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_id_disciplina'], 'fk_nota_disciplina')->references(['id_disciplina'])->on('disciplina')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nota_escolar', function (Blueprint $table) {
            $table->dropForeign('fk_nota_aluno');
            $table->dropForeign('fk_nota_disciplina');
        });
    }
};
