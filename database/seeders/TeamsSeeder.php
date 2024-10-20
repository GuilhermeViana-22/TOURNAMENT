<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seleciona os usuários com IDs entre 3 e 32
        $users = User::whereBetween('id', [3, 32])->get();

        // Percorre os usuários de dois em dois para criar as equipes
        for ($i = 0; $i < $users->count(); $i += 2) {
            if (isset($users[$i + 1])) { // Verifica se existe um par de usuários
                Team::create([
                    'name' => 'Team ' . $users[$i]->id . '-' . $users[$i + 1]->id,
                    'user_id' => $users[$i]->id, // Primeiro usuário
                    'member_id' => $users[$i + 1]->id, // Segundo usuário
                ]);
            }
        }
    }
}
