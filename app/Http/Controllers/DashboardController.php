<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\Team;

class DashboardController extends Controller
{
    public function index(){
        $teams = Team::with(['leader', 'member'])->get(); // Carrega os dados dos usuários associados
        return view('dashboard', ['teams' => $teams]);
    }


    //metodo para monstrar as equipes
    public function equipe(){

        $users = User::where('id', '<>', auth()->user()->id) // Exclui o próprio usuário
        ->whereNotIn('id', function($query) {
            $query->select('member_id')
                ->from('teams')
                ->where('leader_id', auth()->user()->id);
        })
        ->get();
        return view('dash.Equipe.index', compact('users'));
      
    }

    
    public function duo(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:teams,name', // Verifica se o nome da equipe é único
            'member_id' => 'required|exists:users,id', // Verifica se o membro selecionado existe
        ]);
    
        // Verifica se o membro já está na mesma equipe
        $team = Team::where('leader_id', auth()->user()->id)
            ->where('member_id', $request->input('member_id'))
            ->first();
    
        if ($team) {
            return redirect()->back()->withErrors(['member_id' => 'Este membro já está na sua equipe.']);
        }
    
        // Criação da equipe
        Team::create([
            'name' => $request->input('name'),
            'leader_id' => auth()->user()->id, // O usuário logado é o líder
            'member_id' => $request->input('member_id'), // O segundo jogador
        ]);
    
        return redirect()->back()->with('success', 'Equipe criada com sucesso!');
    }

}
