<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CadastrarRequest;

class InscricaoController extends Controller
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
        $requestData = $request->all();

        // Verifique se o usuário já fez um cadastro
        $userId = $requestData['user_id']; // Ou outro campo que identifique o usuário
        $existingRegistration = Inscricao::where('user_id', $userId)->first();

        if ($existingRegistration) {
            return response()->json(['message' => 'Você já realizou um cadastro.'], 400);
        }

        $Register = new Inscricao();
        $Register->fill($requestData);

        DB::beginTransaction();

        try {
            $Register->save();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Houve um erro ao tentar salvar as informações.', 'error' => $e->getMessage()], 500);
        }

        DB::commit();
        return response()->json(['message' => 'O cadastro foi realizado com sucesso']);
    }

   // Método para exibir a view de edição
   public function edit($id)
   {
    $user = auth()->user();

       $register = Inscricao::findOrFail($id); // Obtém o registro pelo ID
       return view('dash.inscricao.editar', compact('user','register')); // Retorna a view de edição com os dados do registro
   }

   // Método para atualizar o registro
   public function atualizar(Request $request)
   {
       $request->validate([
           'nickname_user' => 'required|string|max:255',
           'contact_phone' => 'required|string|min:14|max:15',
           'discord' => 'required|string|max:255',
           // Adicione mais validações conforme necessário
       ]);
   
       dd($request->all()); // Você ainda pode manter isso para depuração
   
       return redirect()->route('registrar.index')->with('success', 'Registro atualizado com sucesso!');
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
        $Register = Inscricao::where('user_id', $user->id)->first();

        // Se não encontrar a equipe, pode redirecionar ou retornar uma resposta de erro
        if (!$Register) {
            return redirect()->route('inscricao')->with('error', 'Você não tem uma equipe cadastrada.');
        }


        $team = Team::where('user_id', $user->id)->first();

        // Retorna a view com o usuário autenticado e a equipe
        return view('dash.inscricao.visualizar', compact('user', 'Register', 'team'));
    }

    public function deletar(Request $request)
    {
     
        try {
            // Busca os registros onde o user_id corresponde ao valor passado
            $inscricoes = Inscricao::where('user_id', $request->get('id'))->get();
        
            // Verifica se existem inscrições a serem deletadas
            if ($inscricoes->isNotEmpty()) {
                foreach ($inscricoes as $inscricao) {
                    $inscricao->delete(); // Aplica o Soft Delete
                }
                return redirect()->route('dashboard')->with('success', 'Todos os times deletados com sucesso.');
            }
        
            // Redireciona de volta com mensagem de erro caso nenhum time seja encontrado
            return redirect()->route('dashboard')->with('error', 'Nenhum time encontrado para deletar.');
            
        } catch (\Exception $e) {
            dd( $e->getMessage());
            // Lida com erros inesperados
            return redirect()->route('dashboard')->with('error', 'Ocorreu um erro ao tentar deletar as inscrições: ' . $e->getMessage());
        }
    }
}
