<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastrarRequest;
use Exception;


class TeamController extends Controller
{


    public function index() {}

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

    public function cadastrar(CadastrarRequest $request)
    {
        // Os dados são validados automaticamente pelo TeamRequest
        $validatedData = $request->validated();

        try {
            $team = new Team();
            $team->fill($validatedData);
           
            $team->save();

            return response()->json([
                'message' => 'Time criado com sucesso!',
                'status' => 'success',
            ], 201);
        } catch (Exception $e) {
            // Retorna uma resposta de erro caso ocorra uma exceção
            return response()->json([
                'message' => 'Ocorreu um erro ao criar o time. Por favor, tente novamente.',
                'error' => $e->getMessage(),
                'status' => 'error',
            ], 500);
        }
    }

    //visualizar
    public function visualizar(Request $request)
    {
        // Verifica se o usuário está autenticado
        $user = auth()->user();
    
        // Se não estiver autenticado, redireciona ou retorna uma resposta de erro
        if (!$user) {
            return redirect()->route('login')->with('error', 'Você precisa estar logado para acessar esta página.');
        }
    
        // Busca a equipe associada ao usuário
        $team = Team::where('user_id', $user->id)->first();
    
        // Se não encontrar a equipe, pode redirecionar ou retornar uma resposta de erro
        if (!$team) {
            return redirect()->route('inscricao')->with('error', 'Você não tem uma equipe cadastrada.');
        }
    
        // Retorna a view com o usuário autenticado e a equipe
        return view('dash.inscricao.visualizar', compact('user', 'team'));
    }    
}
