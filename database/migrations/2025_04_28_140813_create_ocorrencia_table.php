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
        Schema::create('ocorrencia', function (Blueprint $table) {
            $table->bigInteger('id_ocorrencia', true);
            $table->bigInteger('fk_id_aluno')->nullable()->index('fk_ocorrencia_aluno');
            $table->timestamp('data_ocorrencia')->nullable();
            $table->timestamp('data_fim')->nullable();
            $table->string('descricao', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ocorrencia');
    }
};
