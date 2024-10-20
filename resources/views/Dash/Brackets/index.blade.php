<x-app-layout>
    <div class="tournament">
        <!-- tournament logo -->
        <div class="tournament__logo-container tournament__logo-container--right">
            <strong class="tournament__logo tournament__logo--gold"></strong>
        </div>
        <div class="tournament__grid">
            <!-- tournament__round 1/8 -->
            <div class="tournament__round tournament__round--first-round">
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 1 vs Equipe 2</a>
                    <a class="tournament__match__team" href="#">Equipe 3 vs Equipe 4</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 5 vs Equipe 6</a>
                    <a class="tournament__match__team" href="#">Equipe 7 vs Equipe 8</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 9 vs Equipe 10</a>
                    <a class="tournament__match__team" href="#">Equipe 11 vs Equipe 12</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 13 vs Equipe 14</a>
                    <a class="tournament__match__team" href="#">Equipe 15 vs Equipe 16</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 17 vs Equipe 18</a>
                    <a class="tournament__match__team" href="#">Equipe 19 vs Equipe 20</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 21 vs Equipe 22</a>
                    <a class="tournament__match__team" href="#">Equipe 23 vs Equipe 24</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 25 vs Equipe 26</a>
                    <a class="tournament__match__team" href="#">Equipe 27 vs Equipe 28</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Equipe 29 vs Equipe 30</a>
                    <a class="tournament__match__team" href="#">Equipe 31 vs Equipe 32</a>
                </div>
            </div>
        
            <div class="tournament__round tournament__round--first-round">
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
            </div>
        
            <!-- tournament__round 1/2 -->
            <div class="tournament__round">
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
            </div>
        
            <!-- tournament__round final -->
            <div class="tournament__round tournament__round--final">
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">Aguardando resultado</a>
                </div>
            </div>
        
            <!-- tournament__round winner -->
            <div class="tournament__round tournament__round--winner">
                <div class="tournament__match">
                    <a class="tournament__match__team" href="#">final</a>
                </div>
            </div>
        </div>

    </div>
<script> 
   document.addEventListener("DOMContentLoaded", function() {
    const teams = document.querySelectorAll('.tournament__match__team');
    const awaitingResults = document.querySelectorAll('.tournament__round--waiting .tournament__match__team, .tournament__round .tournament__match__team');

    // Inicializa os eventos de arrastar para as equipes
    teams.forEach(team => {
        team.setAttribute('draggable', true);
        
        team.addEventListener('dragstart', function(e) {
            e.dataTransfer.setData('text/plain', this.innerText);
            this.classList.add('moving'); // Efeito visual durante o arraste
        });

        team.addEventListener('dragend', function() {
            this.classList.remove('moving');
        });
    });

    // Adiciona eventos de soltar para as partidas
    awaitingResults.forEach(match => {
        match.addEventListener('dragover', function(e) {
            e.preventDefault(); // Permite que o item seja solto
        });

        match.addEventListener('drop', function(e) {
            e.preventDefault();
            const data = e.dataTransfer.getData('text/plain');
            const previousMatch = [...teams].find(team => team.innerText === data);

            if (this.innerText === "Aguardando resultado") {
                this.innerText = data; // Atualiza o texto com a equipe arrastada
                if (previousMatch) {
                    previousMatch.classList.add('moved'); // Marca a equipe que foi movida
                }
            } else {
                // Se já houver um time, troca com o time arrastado
                const currentTeam = this.innerText;
                this.innerText = data; // Atualiza com o time arrastado

                if (previousMatch) {
                    previousMatch.innerText = currentTeam; // Retorna o nome do time original para a partida
                    previousMatch.classList.add('moved'); // Marca a equipe que foi movida
                }
            }

            // Chama a função para mover para a próxima rodada
            moveToNextRound();
        });
    });

    function moveToNextRound() {
        const waitingMatches = document.querySelectorAll('.tournament__round--waiting .tournament__match__team');

        // Verifica se há equipes aguardando resultados
        waitingMatches.forEach(match => {
            if (match.innerText !== "Aguardando resultado") {
                const nextRound = match.closest('.tournament__round').nextElementSibling;
                const nextMatch = nextRound ? nextRound.querySelector('.tournament__match__team') : null;

                if (nextMatch) {
                    nextMatch.innerText = match.innerText; // Passa a equipe vencedora para a próxima rodada
                    match.innerText = "Aguardando resultado"; // Reseta para "Aguardando resultado"
                }
            }
        });
    }
});
</script>
    
</x-app-layout>
