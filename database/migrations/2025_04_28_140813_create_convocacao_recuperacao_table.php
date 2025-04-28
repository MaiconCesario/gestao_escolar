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
        Schema::create('convocacao_recuperacao', function (Blueprint $table) {
            $table->bigInteger('id_convocacao', true);
            $table->bigInteger('fk_id_aluno')->nullable()->index('fk_convocacao_aluno');
            $table->bigInteger('fk_id_disciplina')->nullable()->index('fk_convocacao_disciplina');
            $table->date('data_convocacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocacao_recuperacao');
    }
};
