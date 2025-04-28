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
        Schema::create('responsavel', function (Blueprint $table) {
            $table->bigInteger('id_responsavel', true);
            $table->string('nome', 100);
            $table->string('cpf', 14)->unique('cpf');
            $table->string('email', 100)->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsavel');
    }
};
