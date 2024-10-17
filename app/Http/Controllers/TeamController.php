<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CadastrarRequest;
use Exception;
use App\Helpers\Retorno;
use Illuminate\Support\Facades\DB;


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

    public function cadastrar(Request $request)
    {
        $requestData = $request->all();
        $team = new Team();
        $team->fill($requestData);
    
        DB::beginTransaction();
    
        try {
            $team->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Houve um erro ao tentar salvar as informações.', 'error' => $e->getMessage()], 500);
        }
    
        DB::commit();
        return response(['message' => 'A equipe foi incluída com sucesso', 'redirect' => route('dashboard')]);
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

    public function deletar(Request $request)
    {
        $team = Team::where('user_id', $request->get('id'))->first();

        if ($team) {
            $team->delete();
            // Redireciona para a dashboard após deletar
            return redirect()->route('dashboard')->with('success', 'Time deletado com sucesso.');
        }

        // Redireciona de volta com mensagem de erro caso o time não seja encontrado
        return redirect()->route('dashboard')->with('error', 'Time não encontrado.');
    }
}
