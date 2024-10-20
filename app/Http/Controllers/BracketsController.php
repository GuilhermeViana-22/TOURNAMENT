<?php

namespace App\Http\Controllers;

use App\Models\Team;

class BracketsController extends Controller
{
    public function index()
    {
        $teams = Team::with(['leader', 'member'])->get(); // Carrega líderes e membros
        return view('Dash.Brackets.index', compact('teams'));
    }

    public function espera()
    {
     
        return view('Dash.Brackets.espera');
    }
}
