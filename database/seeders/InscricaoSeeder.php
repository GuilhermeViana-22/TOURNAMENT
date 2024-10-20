<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Inscricao;
use Faker\Factory as Faker;

class InscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instancia o Faker
        $faker = Faker::create();

        // Seleciona os usuários com IDs entre 3 e 32
        $users = User::whereBetween('id', [3, 32])->get();

        // Percorre cada usuário e cria uma inscrição para ele
        foreach ($users as $user) {
            Inscricao::factory()->create([
                'user_id' => $user->id, // Associa a inscrição com o usuário existente
                'nickname_user' => $user->name . '_gamer', // Exemplo de nickname
                'contact_phone' => $faker->phoneNumber(), // Telefone gerado pelo Faker
                'discord' => $faker->userName() . '#' . $faker->randomNumber(4), // Discord fictício
                'payment_type' => 'live_pix', // Sempre "live_pix"
            ]);
        }
    }
}
