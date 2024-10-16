<?php

namespace App\Http\Controllers;


use App\Models\Team;

class DashboardController extends Controller
{
    public function index(){

     
         // Find de equipes cadastradas
         $teams = Team::all(); // Obtem todas as equipes cadastradas

         // Find de jogadores cadastrados e aprovados
         // $approvedPlayers = Player::where('status', 'aprovado')->get(); // Filtra jogadores com status 'aprovado'
 
         // Find de placares
         // $scores = Score::all(); // Obtem todos os placares
 
         // Find de equipes vitoriosas
         // $victoriousTeams = Team::whereHas('matches', function ($query) {
         //     $query->where('resultado', 'vitória'); // Filtra equipes que venceram
         // })->get();
 
         // // Find de equipes derrotadas
         // $defeatedTeams = Team::whereHas('matches', function ($query) {
         //     $query->where('resultado', 'derrota'); // Filtra equipes que perderam
         // })->get();
 

        return view('dashboard',[  'teams' => $teams]);
    }


    public function pagamentos(){

    }


}
