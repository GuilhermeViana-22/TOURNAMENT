<div class="container my-5" id="pricing">
    <!-- Cabeçalho com imagem e título -->
    <div class="text-center mb-4">
        <h1 class="text-white mt-3">Inscrição no Torneio</h1>
        <p class="text-light lead">Preço simples - Pagamento em Reais (R$) via LIVE PIX</p>
        <h4 class="text-warning mt-3">Prepare-se para a ação!</h4>
    </div>
    <div class="row justify-content-center anime" data-anime="right">
        <div class="col-md-10 text-center mb-5">
            <div class="p-5 rounded shadow-lg" style="background-color: #2d2d2d; border-radius: 20%;">
                <img src="{{ asset('logo/shodwe.png') }}" alt="Brawlhalla - Val" class="img-fluid mb-3"
                    style="max-width: 150px;">
                <h2 class="text-light mb-3"><i class="fas fa-calendar-alt"></i> Data do Torneio: 23 de Novembro</h2>
                <h3 class="text-light"><i class="fas fa-clock"></i> Horário: 13h</h3>
                <p class="text-light mt-4">Assista a transmissão ao vivo nas plataformas:</p>

                <!-- Grid com 3 colunas -->
                <div class="row text-center justify-content-center p-4">
                    <!-- Twitch -->
                    <div class="col-4 mb-4">
                        <a href="https://www.twitch.tv/guilherme_viana_play" target="_blank"
                            class="text-decoration-none">
                            <i class="fab fa-twitch fa-3x text-purple bg-white p-4"></i>

                        </a>
                    </div>

                    <!-- YouTube -->
                    <div class="col-4 mb-4">
                        <a href="https://www.youtube.com/@GuiVianaPlay" target="_blank" class="text-decoration-none">
                            <i class="fab fa-youtube fa-3x text-danger bg-white  p-4"></i>
                        </a>
                    </div>

                    <!-- Discord -->
                    <div class="col-4 mb-4">
                        <a href="https://discord.gg/7GBSyNfADx" target="_blank" class="text-decoration-none">
                            <i class="fab fa-discord fa-3x text-purple bg-white  p-4"></i>

                        </a>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <div class="row text-center">
                    <a  onclick="irPara('{{route('login')}}')"
                        class="btn btn-lg  btn-purple btn-hover-glow d-flex align-items-center justify-content-center mx-auto animate__animated animate__zoomIn text-white"
                        style="max-width: 250px;background: rgb(155,70,252);
background: radial-gradient(circle, rgba(155,70,252,1) 0%, rgba(155,70,252,1) 100%); ">
                        <i class="fas fa-user" style="font-size: 28px; margin-right: 12px;"></i>
                        <strong>Faça seu cadastro</strong>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function irPara(rota){
    // Exibe um SweetAlert indicando que está carregando
    Swal.fire({
        title: 'Carregando...',
        html: 'Por favor, aguarde...',
        allowOutsideClick: false,
        showCloseButton: false,
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Redireciona para a rota após 2 segundos
    setTimeout(() => {
        window.location.href = rota;
    }, 500);
}
</script>
