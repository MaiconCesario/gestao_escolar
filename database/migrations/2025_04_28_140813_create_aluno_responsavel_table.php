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
        Schema::create('aluno_responsavel', function (Blueprint $table) {
            $table->bigInteger('id_aluno_responsavel', true);
            $table->bigInteger('fk_id_aluno')->nullable()->index('fk_aluno_responsavel');
            $table->bigInteger('fk_id_responsavel')->nullable()->index('fk_responsavel_aluno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_responsavel');
    }
};
