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
        Schema::create('disciplina', function (Blueprint $table) {
            $table->bigInteger('id_disciplina', true);
            $table->string('nome', 50)->nullable();
            $table->string('descricao', 100)->nullable();
            $table->bigInteger('fk_id_professor')->nullable()->index('fk_disciplina_professor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplina');
    }
};
