<?php

namespace Database\Factories;

use App\Models\Inscricao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscricaoFactory extends Factory
{
    protected $model = Inscricao::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Podemos sobrescrever isso no seeder
            'nickname_user' => $this->faker->userName(), // Nickname de jogo
            'contact_phone' => $this->faker->phoneNumber(), // Telefone de contato
            'discord' => $this->faker->userName() . '#' . $this->faker->randomNumber(4), // Nome de usuário do Discord
            'payment_type' => 'live_pix', // Sempre "live_pix"
        ];
    }
}
