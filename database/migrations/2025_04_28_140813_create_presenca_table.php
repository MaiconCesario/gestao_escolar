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
        Schema::create('presenca', function (Blueprint $table) {
            $table->bigInteger('id_presenca', true);
            $table->bigInteger('fk_id_aluno')->nullable()->index('fk_presenca_aluno');
            $table->bigInteger('fk_id_horario')->nullable()->index('fk_presenca_horario');
            $table->boolean('presente')->nullable();
            $table->timestamp('data_presenca')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presenca');
    }
};
