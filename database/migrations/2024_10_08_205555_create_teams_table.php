<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Executa a migração.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Relaciona com a tabela 'users'
            $table->string('nickname_user', 255); // Altere o nome do campo para 'nickname_user'
            $table->string('nickname_team', 255); // Altere o nome do campo para 'nickname_team'
            $table->string('duo_name', 255); // Altere o nome do campo para 'duo_name'    
            $table->string('contact_phone', 20); // Pode ser salvo como string se incluir caracteres como '+', '-', etc.
            $table->string('discord', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverte a migração.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
