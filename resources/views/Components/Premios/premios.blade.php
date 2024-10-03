<div class="container mt-6">
<hr>

    <!-- Seção de Cards e Prêmios -->
    <div class="row mt-5">
        <div class="col-md-4 text-center ">
            <div class="card shadow-lg hover-zoom mb-4 ">
                <h3 class="card-title text-uppercase mt-3">Card de Participação Exclusivo</h3>
                <img src="{{ asset('asset/itens/card.png') }}" class="card-img-top img-fluid rounded mx-auto" alt="Card de Participação">

            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="card shadow-lg hover-zoom mb-4">
                <h3 class="card-title text-uppercase mt-3">Premiação Via Pix</h3>
                <img  src="{{ asset('asset/itens/pix.png') }}" class="card-img-top img-fluid rounded mx-auto mt-4" alt="Premiação Pix" style="width: 300px;">
                <div class="card-body">
                    <p class="card-text">Lute para ganhar prêmios em dinheiro diretamente na sua conta via Pix!</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="card shadow-lg hover-zoom mb-4">
                <h3 class="card-title text-uppercase mt-3">Prêmios Secretos Revelados?</h3>
                <div class="card-body">
                    <p class="card-text">Achou que só o primeiro lugar levaria prêmios? Pense de novo... 😏</p>
                    <img src="{{ asset('asset/itens/box.png') }}" class="card-img-top img-fluid rounded mx-auto mt-4" alt="Premiação Pix" style="width: 300px;">
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Estilos e Efeitos -->
<style>
    .btn-hover-glow:hover {
        box-shadow: 0 0 15px rgba(255, 193, 7, 0.6);
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
