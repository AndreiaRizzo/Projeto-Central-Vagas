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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();  // idcurso como primary key
            $table->integer('codcurso');
            $table->string('nome');
            $table->string('dia');
            $table->string('periodo');
            $table->timestamps();   // para created_at e updated_at
        });
    }

   


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
