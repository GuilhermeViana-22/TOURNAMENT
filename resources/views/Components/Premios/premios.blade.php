<div class="container" id="premios"   data-anime="right">
    <div class="col-md-12 mx-auto text-center ">
        <h1 class="text-white heading-black">Prêmios</h2>

            <p class="text-muted">Sua equipe está pronta para ser a próxima campeã? A hora chegou! Divirta-se, desafie os
                melhores e lute por prêmios incríveis.</p>

    </div>


    <!-- Seção de Cards e Prêmios -->
    <div class="row mt-5">
        <div class="col-md-4 text-center ">
            <div class="card shadow-lg hover-zoom mb-4   anime" data-anime="right" >
                <h3 class="card-title text-uppercase mt-4">Card de Participação</h3>
                <img src="{{ asset('asset/itens/card.png') }}" class="card-img-top img-fluid rounded mx-auto"
                    alt="Card de Participação"style="width: 260px;">

            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="card shadow-lg hover-zoom mb-4  anime" data-anime="right">
                <h3 class="card-title text-uppercase mt-3">Premiação Via Pix</h3>
                <img src="{{ asset('asset/itens/pix.png') }}" class="card-img-top img-fluid rounded mx-auto mt-4"
                    alt="Premiação Pix" style="width: 300px;">

            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="card shadow-lg hover-zoom mb-4  anime" data-anime="right">
                <h3 class="card-title text-uppercase mt-3">Prêmio Secreto</h3>
                <div class="card-body">
                    <img src="{{ asset('asset/itens/box.png') }}" class="card-img-top img-fluid rounded mx-auto mt-1"
                        alt="Premiação Pix" style="width: 300px;">

                </div>
            </div>
        </div>
    </div>
    <hr>

</div>
<br>



<!-- Estilos e Efeitos -->
<style>
    .btn-hover-glow:hover {
        box-shadow: 0 0 15px rgba(217, 98, 253, 0.6);
        transition: box-shadow 0.3s ease-in-out;
    }

    .hover-zoom:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }

    .animate__animated {
        visibility: visible;
        animation-duration: 1s;
        animation-delay: 0.2s;
    }
</style>
