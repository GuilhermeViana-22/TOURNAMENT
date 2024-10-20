<x-app-layout>
   
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Div para Inscrição no Torneio -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-black text-justify">
                    <h1 class="text-3xl font-bold mb-4">Equipes cadastradas: {{ $teams->count() }}</h1>
                    <hr class="mb-6">
                    @if ($teams->isEmpty())
                        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                            <p>⚠️ Ainda não existem equipes cadastradas no campeonato.</p>
                        </div>
                    @else
  
                        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                            <!-- Título do Dashboard -->
                            <div class="mb-8 text-center">
                                <p class="text-lg text-gray-600">Veja abaixo todas as equipes formadas para o campeonato!</p>
                            </div>
                    
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                                @foreach ($teams as $team)
                                <div class="relative bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-3">{{ $team->name }}</h2>
                                    <p class="text-gray-600 mb-4">Equipe composta por:</p>
                                    <ul class="text-gray-700">
                                        <li><strong>Líder:</strong> {{ $team->leader->name }}</li>
                                        <li><strong>Membro:</strong> 
                                            @if($team->member)
                                                {{ $team->member->name }}
                                            @else
                                                <span class="text-red-500">Nenhum membro selecionado</span>
                                            @endif
                                        </li>
                                    </ul>
                                    <!-- Pequeno efeito de brilho ao passar o mouse -->
                                    <div class="absolute inset-0 bg-white opacity-0 hover:opacity-10 transition-opacity duration-500 rounded-lg"></div>
                                </div>
                                @endforeach
                            </div>  
                        </div>
       
                    
                    @endif
                </div>
            </div>
    
            <!-- Div para Regras do Torneio -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-black text-justify">
                    <h1 class="text-3xl font-bold mb-4">Regras do Torneio</h1>
                    <p class="mb-4">As regras são fundamentais para garantir um campeonato justo e divertido para todos os participantes. A colaboração de cada um é essencial!</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Formato do Torneio: Eliminatórias 2x2 com partidas diretas.</li>
                        <li>Duração das Partidas: Máximo de 5 minutos por partida.</li>
                        <li>Personagens: Todos os personagens disponíveis no jogo podem ser usados.</li>
                        <li>Limite de Vida: Cada jogador terá 3 vidas por partida.</li>
                        <li>Prêmios: Entrega de prêmios para os 3 primeiros colocados.</li>
                        <li>Desempate: Partida extra em caso de empate.</li>
                        <li>Comunicação: Jogadores devem estar conectados ao Discord.</li>
                        <li>Comportamento: Respeito e fair play são obrigatórios. Jogadores que não seguirem estas diretrizes serão desqualificados.</li>
                        <li>Gravação: Partidas gravadas poderão ser usadas para clipes de destaques.</li>
                        <li>Dúvidas: Contate a equipe organizadora pelo Discord.</li>
                        <li>Ofensas e Brigas: Equipes que tentarem desestabilizar o campeonato serão expulsas.</li>
                    </ul>
                </div>
            </div>
    
            <!-- Div para Prêmios -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-black text-justify">
                    <h1 class="text-3xl font-bold mb-4">Prêmios</h1>
                    <p class="mb-4">Prêmios para os 3 primeiros colocados! Não perca a chance de brilhar e conquistar sua recompensa!</p>
                    <p class="mb-4">Inscreva-se agora e prepare-se para a batalha!</p>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
