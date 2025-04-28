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
        Schema::create('nota_escolar', function (Blueprint $table) {
            $table->bigInteger('id_nota', true);
            $table->bigInteger('fk_id_aluno')->nullable()->index('fk_nota_aluno');
            $table->bigInteger('fk_id_disciplina')->nullable()->index('fk_nota_disciplina');
            $table->float('nota1', null, 0)->nullable();
            $table->float('nota2', null, 0)->nullable();
            $table->float('nota3', null, 0)->nullable();
            $table->float('nota4', null, 0)->nullable();
            $table->float('nota_final', null, 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_escolar');
    }
};
