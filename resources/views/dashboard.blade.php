<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-gray-200 leading-tight text-center">
           Bem vindo ao Painel Administrativo do Torneio
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Div para Inscrição no Torneio -->
            <div class="bg-gray-800 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-100 dark:text-gray-100  text-justify">
                    <h1 class="text-2xl font-bold mb-4">🏆 Inscrição no Torneio Warriors of Valhalla</h1>
                    <p class="mb-4">Prepare-se para a ação! 🎮</p>
                    <h2 class="text-lg font-semibold mb-2">🗓️ Data do Torneio:</h2>
                    <p class="mb-4">23 de Novembro às 13h!</p>
                    <h2 class="text-lg font-semibold mb-2">💲 Inscrição:</h2>
                    <p class="mb-4">R$ 10,00</p>
                    <p class="mb-4">🌟 Transmissão ao vivo de todas as emoções!</p>
                    <p class="mb-4">Destaques do evento com clipes das partidas!</p>
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
                <div class="p-6 text-gray-100 dark:text-gray-100  text-justify">
                    <h1 class="text-2xl font-bold mb-4">🎉 Prêmios</h1>
                    <p class="mb-4">Prêmios para os 3 primeiros colocados! Não perca a chance de brilhar e levar para casa a sua recompensa!</p>
                    <p class="mb-4">Inscreva-se agora e prepare-se para a batalha!</p>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
