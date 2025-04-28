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
        Schema::create('endereco_aluno', function (Blueprint $table) {
            $table->bigInteger('id_endereco_aluno', true);
            $table->string('logradouro', 100);
            $table->string('numero', 10);
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->char('estado', 2)->nullable();
            $table->bigInteger('fk_id_aluno')->nullable()->index('fk_endereco_aluno');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco_aluno');
    }
};
