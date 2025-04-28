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
        Schema::create('tarefa', function (Blueprint $table) {
            $table->bigInteger('id_tarefa', true);
            $table->bigInteger('fk_id_diciplina')->nullable()->index('fk_tarefa_disciplina');
            $table->bigInteger('fk_id_turma')->nullable()->index('fk_tarefa_turma');
            $table->date('data_entrega')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa');
    }
};
