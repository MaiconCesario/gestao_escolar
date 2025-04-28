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
        Schema::table('presenca', function (Blueprint $table) {
            $table->foreign(['fk_id_aluno'], 'fk_presenca_aluno')->references(['id_aluno'])->on('aluno')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['fk_id_horario'], 'fk_presenca_horario')->references(['id_horario'])->on('horario_escolar')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('presenca', function (Blueprint $table) {
            $table->dropForeign('fk_presenca_aluno');
            $table->dropForeign('fk_presenca_horario');
        });
    }
};
