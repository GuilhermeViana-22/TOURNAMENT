<div class="container" id="faq">
        <!-- Imagens dos personagens -->
        <div class="mt-4 d-flex justify-content-center">
            <img src="{{ asset('/asset/lendas/nai.png') }}" alt="Brawlhalla - Shang" class="img-fluid m-2" style="max-width: 250px;">
      </div>
    <div class="row">
        <div class="col-12 text-center">
            <h1>Perguntas Frequentes</h2>
            <h2 class="text-muted text-center">Respostas para as dúvidas mais comuns sobre a Copa Brawlhalla.</h2>
            <h4 class="text-muted text-center">Fornecida por <a href="https://www.instagram.com/gui_viana_play/" class="name">@Guilherme_viana_play</a>.</h4>
        </div>
    </div>
    <hr>
    <div class="row mt-5">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-5">
                    <h4>Qual é o formato do torneio?</h4>
                    <p class="text-muted">O torneio será no formato <b class="text-warning">2x2</b>, onde cada equipe será composta por dois jogadores. As partidas seguem um formato de eliminação direta, e a comunicação entre os membros da equipe será fundamental para a vitória!</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-5">
                    <h4>Como funciona a premiação?</h4>
                    <p class="text-muted">O primeiro lugar ganhará <b class="text-danger">R$ 100,00</b> via PIX. O segundo e o terceiro lugares receberão prêmios surpresa que serão revelados ao final do torneio. Prepare-se para recompensas incríveis!</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-5">
                    <h4>Quem pode participar do torneio?</h4>
                    <p class="text-muted">O torneio é aberto a todos os jogadores, independentemente do nível de habilidade. Todos são bem-vindos a se inscrever e competir, desde que sigam as regras do torneio e se registrem a tempo.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-5">
                    <h4>Como faço para me inscrever?</h4>
                    <p class="text-muted">As inscrições podem ser feitas preenchendo um <b class="text-info">formulário de cadastro</b>. Nele, você e seu parceiro de equipe devem fornecer o nome completo, nickname e o nome da equipe. Após isso, sua inscrição estará confirmada!</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-5">
                    <h4>Há uma taxa de inscrição?</h4>
                    <p class="text-muted">Sim, há uma pequena taxa de inscrição para participar do torneio. Ela será usada para a organização e manutenção do evento, garantindo uma experiência de alta qualidade para todos os participantes.</p>
                </div>
                <div class="col-lg-6 col-md-12 mb-5">
                    <h4>Posso assistir às partidas ao vivo?</h4>
                    <p class="text-muted">Sim! Todas as partidas serão transmitidas ao vivo no canal oficial da <b class="name">Twitch</b>. Venha assistir, torcer pela sua equipe favorita e fazer parte dessa comunidade incrível!</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<section style="text-align: center; margin: 20px;">
    <button
        id="shareButton"
        class="btn btn-danger"
        style="display: inline-block; color: white; padding: 15px 20px; border-radius: 5px; text-decoration: none; font-size: 16px; transition: background-color 0.3s; max-width: 90%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
    >
        <i class="fab fa-twitch" style="font-size: 24px; margin-right: 10px;"></i>
        Compartilhe meu perfil na Twitch e chame amigos!
    </button>
</section>
<script>
    document.getElementById('shareButton').addEventListener('click', function() {
        // Copiar link para a área de transferência
        const link = 'https://www.twitch.tv/guilherme_viana_play';
        navigator.clipboard.writeText(link).then(() => {
            // Exibir SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Link copiado!',
                text: 'O link foi copiado para a área de transferência.',
                confirmButtonText: 'OK'
            });
        }).catch(err => {
            console.error('Erro ao copiar o link: ', err);
        });
    });
</script>
