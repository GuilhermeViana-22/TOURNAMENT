<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center">
           Bem-vindo ao Painel Administrativo do Torneio
        </h2>
    </x-slot>    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Div para Inscrição no Torneio -->
            <div class="bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-100 dark:text-gray-100 text-justify">
                    <h1 class="text-2xl font-bold mb-4">🏆 Equipes cadastradas: {{ $teams->count() }}</h1>
                    <hr>
                    <br>
                    <br>
                    @if ($teams->isEmpty())
                        <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                            <p>⚠️ Ainda não existem equipes cadastradas no campeonato.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach ($teams as $team)
                                <div class="bg-[#262626] text-white border border-purple-700 rounded-lg shadow-lg overflow-hidden" style="max-width: 400px;">
                                    <!-- Imagem como banner da equipe -->
                                    <img src="{{ asset('logo/brawl.png') }}" alt="Valhalla Events" class="w-full h-70 object-cover">
                                    <div class="p-6 flex-grow bg-gray-800 rounded-b-lg">
                                        <h2 class="text-xl font-bold mb-2 text-purple-400">Time: {{ $team->nickname_team }}</h2>
                                        <p class="text-sm mb-4 text-gray-300">Dupla: <span class="font-semibold text-white">{{ $team->duo_name }}</span></p>
                                        <div class="mb-4 border-t border-gray-700 pt-4">
                                            <h3 class="text-md font-semibold text-purple-300 mb-1">Jogadores</h3>
                                            <ul class="list-disc list-inside text-gray-200">
                                                <li class="mb-1">{{ $team->nickname_user }}</li>
                                                <li class="mb-1">{{ $team->duo_name }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
    
            <!-- Div para Regras do Torneio -->
            <div class="bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-100 dark:text-gray-100 text-justify">
                    <h1 class="text-2xl font-bold mb-4">📜 Regras do Torneio</h1>
                    <p class="mb-4">A importância das regras é fundamental para garantir um campeonato saudável e divertido para todos os participantes. A colaboração de cada um é essencial!</p>
                    <ul class="list-disc list-inside mb-4">
                        <li>Formato do Torneio: Eliminatórias 2x2 com partidas diretas.</li>
                        <li>Duração das Partidas: Cada partida terá uma duração máxima de 5 minutos.</li>
                        <li>Personagens: Todos os personagens disponíveis no jogo podem ser usados.</li>
                        <li>Limite de Vida: Cada jogador terá 3 vidas por partida.</li>
                        <li>Prêmios: Serão entregues prêmios para os 3 primeiros colocados.</li>
                        <li>Desempate: Em caso de empate, será realizada uma partida extra para decidir o vencedor.</li>
                        <li>Comunicação: Os jogadores devem estar conectados ao Discord durante as partidas.</li>
                        <li>Comportamento: Respeito e fair play são obrigatórios. Jogadores que não seguirem estas diretrizes poderão ser desqualificados.</li>
                        <li>Gravação: Todas as partidas serão gravadas e poderão ser utilizadas para clipes de destaques.</li>
                        <li>Dúvidas: Em caso de dúvidas, entre em contato com a equipe organizadora através do Discord.</li>
                        <li>Ofensas e Brigas: Equipes que tentarem desequilibrar o campeonato através de ofensas ou brigas serão expulsas.</li>
                    </ul>
                </div>
            </div>
    
            <!-- Div para Prêmios -->
            <div class="bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-100 dark:text-gray-100 text-justify">
                    <h1 class="text-2xl font-bold mb-4">🎉 Prêmios</h1>
                    <p class="mb-4">Prêmios para os 3 primeiros colocados! Não perca a chance de brilhar e levar para casa a sua recompensa!</p>
                    <p class="mb-4">Inscreva-se agora e prepare-se para a batalha!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
