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
        Schema::create('avaliacao', function (Blueprint $table) {
            $table->bigInteger('id_avaliacao', true);
            $table->bigInteger('fk_id_disciplina')->nullable()->index('fk_avaliacao_disciplina');
            $table->bigInteger('fk_id_turma')->nullable()->index('fk_avaliacao_turma');
            $table->date('data_avaliacao')->nullable();
            $table->enum('tipo_avaliacao', ['Prova', 'Trabalho'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliacao');
    }
};
