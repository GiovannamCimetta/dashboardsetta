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
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo_Maquina', 20)->unique();
            $table->string('Fabricante');
            $table->string('Descrição', 250);
            $table->string('Cidade');
            $table->float('Eficiencia');
            $table->float('Temperatura')->nullable(); // Adiciona a coluna Temperatura
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machines'); // Corrigido para 'machines'
    }
};
