<x-app-layout>
    <div class="max-w-4xl mx-auto bg-dark-300 text-white border border-green-600 rounded-lg shadow-md overflow-hidden mb-6">
        <div class="p-4">
            <h2 class="text-2xl font-bold mb-2">Time: {{ $team->nickname_team }}</h2>
            <p class="text-sm mb-4">Dupla: <span class="font-semibold">{{ $team->duo_name }}</span></p>
            <table class="min-w-full border-collapse">
                <thead>
                    <tr class="bg-gray-800">
                        <th class="px-4 py-2">Jogador 1</th>
                        <th class="px-4 py-2">Jogador 2</th>
                        <th class="px-4 py-2">Vitórias</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-700 transition duration-200">
                        <td class="px-4 py-2 border-b border-gray-600">{{ $team->nickname_user }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">{{ $team->duo_name }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">2</td>
                        <td class="px-4 py-2 border-b border-gray-600 flex space-x-2">
                            <button @click="editPlayer({{ $team->nickname_user }})" class="text-gray-400 hover:text-gray-300">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <button @click="deletePlayer({{ $team->duo_name }})" class="text-gray-400 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <!-- Adicione mais jogadores aqui conforme necessário -->
                </tbody>
            </table>
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
