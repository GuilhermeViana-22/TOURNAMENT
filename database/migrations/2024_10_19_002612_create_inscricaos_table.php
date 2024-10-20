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
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nickname_user', 255); // Nome do usuário
            $table->string('contact_phone', 20); // Telefone de contato
            $table->string('discord', 255); // Discord
            $table->string('payment_type', 100); // Tipo de pagamento
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricaos');
    }
};
