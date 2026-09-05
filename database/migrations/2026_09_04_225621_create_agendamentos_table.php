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
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->string('cliente');
            $table->string('email');
            $table->string('animal');
            $table->enum('servico', ['consulta', 'vacinacao', 'banho', 'tosa']);
            $table->date('data');
            $table->enum('status', ['pendente','confirmado', 'cancelado'])->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
