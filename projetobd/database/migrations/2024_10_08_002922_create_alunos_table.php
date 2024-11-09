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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete("restrict");
            $table->string('cpfAluno');
            $table->string('nome');
            $table->date('dataNasc');
            $table->integer('idade');
            $table->string('nomeResp');
            $table->string('celResp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
