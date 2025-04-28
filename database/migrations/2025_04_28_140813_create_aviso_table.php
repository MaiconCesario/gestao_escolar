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
        Schema::create('aviso', function (Blueprint $table) {
            $table->bigInteger('id_aviso', true);
            $table->string('titulo', 50)->nullable();
            $table->text('mensagem')->nullable();
            $table->timestamp('data_emissao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aviso');
    }
};
