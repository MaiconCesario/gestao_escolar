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
        Schema::create('turma', function (Blueprint $table) {
            $table->bigInteger('id_turma', true);
            $table->string('nome_turma', 50)->nullable();
            $table->bigInteger('fk_id_disciplina')->nullable()->index('fk_turma_disciplina');
            $table->bigInteger('fk_id_professor')->nullable()->index('fk_turma_professor');
            $table->enum('turno', ['Manhã', 'Tarde', 'Noite'])->nullable();
            $table->integer('ano')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turma');
    }
};
