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
        Schema::connection('external')->create('machine_logs', function (Blueprint $table) {
            $table->id();
            $table->double('temperatura', 8, 2);
            $table->double('eficiencia', 8, 2);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('external')->dropIfExists('machine_logs');
    }
};
