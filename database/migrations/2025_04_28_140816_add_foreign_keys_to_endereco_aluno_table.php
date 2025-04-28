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
        Schema::table('endereco_aluno', function (Blueprint $table) {
            $table->foreign(['fk_id_aluno'], 'fk_endereco_aluno')->references(['id_aluno'])->on('aluno')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endereco_aluno', function (Blueprint $table) {
            $table->dropForeign('fk_endereco_aluno');
        });
    }
};
