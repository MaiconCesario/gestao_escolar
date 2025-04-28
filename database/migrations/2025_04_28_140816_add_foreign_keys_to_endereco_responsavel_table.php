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
        Schema::table('endereco_responsavel', function (Blueprint $table) {
            $table->foreign(['fk_id_responsavel'], 'fk_endereco_responsavel')->references(['id_responsavel'])->on('responsavel')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('endereco_responsavel', function (Blueprint $table) {
            $table->dropForeign('fk_endereco_responsavel');
        });
    }
};
