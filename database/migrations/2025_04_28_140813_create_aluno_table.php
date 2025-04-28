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
        Schema::create('aluno', function (Blueprint $table) {
            $table->bigInteger('id_aluno', true);
            $table->string('nome', 100);
            $table->date('data_nascimento');
            $table->enum('sexo', ['M', 'F']);
            $table->string('cpf', 14)->unique('cpf');
            $table->string('email', 100)->unique('email');
            $table->date('data_matricula')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno');
    }
};
