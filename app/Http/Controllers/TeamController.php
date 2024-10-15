<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    

    public function index(){

    }

    public function inscricao(Request $request)
    {
        // Verifica se o usuário está autenticado
        $user = auth()->user();
    
        // Se não estiver autenticado, redireciona ou retorna uma resposta de erro
        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }
    
        // Retorna a view com o usuário autenticado
        return view('dash.inscricao.inscricao', compact('user'));
    }

    public function cadastrar(Request $request)
    {
        // Verifica se o usuário está autenticado
        $user = auth()->user();
    
        // Se não estiver autenticado, redireciona ou retorna uma resposta de erro
        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }
    
        // Retorna a view com o usuário autenticado
        return view('dash.inscricao.inscricao', compact('user'));
    }
}
