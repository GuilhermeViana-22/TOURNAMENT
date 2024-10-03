<!-- features section -->
<section class="pt-6 pb-7" id="features">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center">
                <h1 class="heading-black" >Participe do Torneio Warriors of Valhalla!</h3>
                <p class="text-muted lead" >Prepare-se para uma competição épica! O Warriors of Valhalla está de volta com um formato emocionante de 2x2. Reúna sua dupla e entre na batalha para conquistar o prêmio de R$100 para o primeiro lugar! O segundo e terceiro colocados também receberão prêmios surpresas. Não fique de fora dessa oportunidade de mostrar suas habilidades e se divertir!</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="row feature-boxes">
                    <div class="col-md-6 mb-4 box"> <!-- Adicionado mb-4 para espaçamento inferior -->
                        <div class="icon-box box-primary text-center">
                            <div class="icon-box-inner">
                                <span data-feather="edit-3" width="35" height="35"></span>
                            </div>
                        </div>
                        <h3>Regras do Torneio 2x2</h3>
                        <p class="text-muted">As equipes devem ser compostas por dois jogadores. Cada partida será disputada em um formato de eliminação direta. A estratégia e a comunicação em equipe serão essenciais para a vitória!</p>
                    </div>

                    <div class="col-md-6 mb-4 box"> <!-- Adicionado mb-4 para espaçamento inferior -->
                        <div class="icon-box box-warning text-center">
                            <div class="icon-box-inner">
                                <span data-feather="monitor" width="35" height="35"></span>
                            </div>
                        </div>
                        <h3>Partidas Ao Vivo</h3>
                        <p class="text-muted">Assista às partidas ao vivo na nossa plataforma na Twitch. Venha torcer pela sua equipe favorita e faça parte da ação!</p>
                    </div>

                    <div class="col-md-6 mb-4 box"> <!-- Adicionado mb-4 para espaçamento inferior -->
                        <div class="icon-box box-danger text-center">
                            <div class="icon-box-inner">
                                <span data-feather="layout" width="35" height="35"></span>
                            </div>
                        </div>
                        <h3>Premiação Incrível</h3>
                        <p class="text-muted">Além do prêmio de R$100 para o primeiro colocado, o segundo e terceiro lugares receberão prêmios surpresas, tornando essa competição ainda mais emocionante!</p>
                    </div>

                    <div class="col-md-6 mb-4 box"> <!-- Adicionado mb-4 para espaçamento inferior -->
                        <div class="icon-box box-info text-center">
                            <div class="icon-box-inner">
                                <span data-feather="globe" width="35" height="35"></span>
                            </div>
                        </div>
                        <h3>Comunidade Engajada</h3>
                        <p class="text-muted">Participe de uma comunidade de jogadores apaixonados e experimente o espírito esportivo. Junte-se a nós para criar memórias inesquecíveis!</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-6">
            <div class="col-md-6">
                <h2>Não Perca a Oportunidade de Brilhar!</h2>
                <p class="mb-5">Warriors of Valhalla está animada para ver você e sua equipe brilhando. Mostre suas habilidades, divirta-se e lute por prêmios fantásticos. Inscreva-se agora e esteja preparado para o desafio!</p>
                <a href="https://www.twitch.tv/yourchannel" class="btn btn-warning d-flex align-items-center" target="_blank">
                    <span class="fab fa-twitch" style="font-size: 24px; margin-right: 10px;"></span>
                    <strong>Inscreva-se Agora!</strong>
                </a>
            </div>
            <div class="col-md-5 offset-md-1">
                <div class="slick-about">
                    <div class="card text-center mb-3" onclick="danceCard(this)">
                        <h3>Card de Participação</h3>
                        <img src="{{asset('asset/itens/card.png')}}" class="img-fluid rounded d-block mx-auto" alt="Card" />
                    </div>
                    <div class="card text-center mb-3" onclick="danceCard(this)">
                        <h3>Premiação em Pix</h3>
                        <img id="pix" src="{{asset('asset/itens/pix.png')}}" class="img-fluid rounded d-block mx-auto mt-4" alt="Skin" style="width:300px" />
                    </div>
                    <div class="card text-center mb-3" onclick="danceCard(this)">
                        <h3>Esquema de cores</h3>
                        <img id="cor" src="{{asset('asset/itens/cor.png')}}" class="img-fluid rounded d-block mx-auto" alt="teste" style="padding: 20px;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
