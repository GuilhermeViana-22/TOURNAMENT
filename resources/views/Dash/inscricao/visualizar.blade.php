<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Div para Inscrição no Torneio -->
            <div class="bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-100 dark:text-gray-100 text-justify">
                    <h1 class="text-2xl font-bold mb-4">🏆 Seu registro</h1>
                    <hr class="border-gray-600">
                    <br>
                    <div class="border border-purple-700 rounded-lg p-4"> 
                        <h2 class="text-2xl font-bold mb-2">Time: {{ $team->nickname_team }}</h2>
                        <p class="text-sm mb-4">Dupla: <span class="font-semibold">{{ $team->duo_name }}</span></p>
                        <table class="min-w-full border-collapse border border-purple-600">
                            <thead>
                                <tr class="bg-purple-600 text-black border border-black">
                                    <th class="px-4 py-2 border border-purple-600">Jogador 1</th>
                                    <th class="px-4 py-2 border border-purple-600">Jogador 2</th>
                                    <th class="px-4 py-2 border border-purple-600">Vitórias</th>
                                    <th class="px-4 py-2 border border-purple-600">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white-600 text-white border border-black"> <!-- Linha do Jogador 1 -->
                                    <td class="px-4 py-2 border-b border-purple-600">{{ $team->nickname_user }}</td>
                                    <td class="px-4 py-2 border-b border-purple-600">{{ $team->duo_name }}</td>
                                    <td class="px-4 py-2 border-b border-purple-600">2</td>
                                    <td class="px-4 py-2 border-b border-purple-600 flex space-x-2">
                                        <button @click="editPlayer({{ $team->nickname_user }})"
                                            class="text-gray-400 hover:text-gray-300">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <form @submit.prevent="deletePlayer('{{ $team->user_id }}')" method="POST" action="{{ route('deletar') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $team->user_id }}">
                                            <button type="submit" class="text-gray-400 hover:text-red-500">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Adicione mais jogadores aqui conforme necessário -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('teamManager', () => ({
            editPlayer(playerId) {
                // Lógica para editar o jogador
                console.log('Edit player with ID:', playerId);
            },
            deletePlayer(playerId) {
                // Lógica para excluir o jogador
                console.log('Delete player with ID:', playerId);
            }
        }));
    });
</script>
