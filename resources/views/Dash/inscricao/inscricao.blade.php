<x-app-layout>
    <div class="flex justify-end mt-6">
        <a href="{{ route('dashboard') }}"
            class="bg-orange-300 hover:bg-orange-400 text-white font-bold py-2 px-4 rounded-md transition duration-300">
            Voltar
        </a>
    </div>
    <div class="max-w-[700px] mx-auto p-6 bg-white rounded-lg shadow-lg" x-data="{
        nicknameTeam: '',
        alertMessage: '',
        alertStatus: '',
        showAlert: false
    }" x-init="nicknameTeam = ''">

        <h1 class="text-2xl font-bold text-center bg-gray-600 p-4 text-white rounded-t-lg">
            Bem-vindo, {{ Str::ucfirst($user->name) }}
        </h1>

        <p class="mt-4 text-gray-700 text-center">
            Por favor, informe os seguintes nicknames:
        </p>

        <div class="mt-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 text-justify rounded-md">
            <strong>Atenção!</strong> Você deve informar:
            <ul class="list-disc list-inside mt-2">
                <li>Seu nickname</li>
                <li>Nickname do amigo</li>
                <li>Nickname da equipe</li>
                <li>O pagamento do participante é individual</li>
            </ul>
        </div>

        <!-- Formulário para preencher os nicknames -->
        <form action="{{ route('cadastrar') }}" method="POST" enctype="multipart/form-data" id="salvar_cadastrar" data-route="{{ route('cadastrar') }}">

            @csrf

            <input type="hidden" name="user_id" id="user_id" required value="{{ auth()->id() }}">
            <!-- Seu Nickname -->
            <div class="mb-4">
                <label for="nickname_user" class="block text-gray-700">Seu Nickname:</label>
                <input type="text" name="nickname_user" id="nickname_user" required
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nickname">
            </div>

            <!-- Nickname da Equipe -->
            <div class="mb-4">
                <label for="nickname_team" class="block text-gray-700">Nickname da Equipe:</label>
                <input type="text" name="nickname_team" id="nickname_team" required x-model="nicknameTeam"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Nome da equipe">
            </div>

            <!-- Campos Adicionais (Nome do Duo, Telefone, Discord) -->
            <div x-show="nicknameTeam.trim() !== ''" x-transition
                class="mt-4 space-y-4 p-4 bg-blue-50 border border-blue-200 rounded-md">

                <div>
                    <label for="duo_name" class="block text-gray-700">Nome do Duo:</label>
                    <input type="text" name="duo_name" id="duo_name" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nome do duo">
                </div>

                <div>
                    <label for="contact_phone" class="block text-gray-700">Telefone de Contato:</label>
                    <input type="tel" name="contact_phone" id="contact_phone" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="(XX) XXXXX-XXXX">
                </div>

                <div>
                    <label for="discord" class="block text-gray-700">Discord:</label>
                    <input type="text" name="discord" id="discord" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 
                                  focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Usuário#1234">
                </div>
            </div>



            <!-- Exibir QR Code -->
            <div x-show="nicknameTeam.trim() !== ''" class="mt-4 text-center">
                <label class="block text-gray-700">QR Code:</label>
                <img src="{{ asset('asset/itens/qrcode.png') }}" alt="QR Code" class="mx-auto mt-2" />
            </div>

            <button type="button"
                class="mt-6 w-full bg-blue-500 text-white px-4 py-2 rounded-md 
                   hover:bg-blue-600 transition duration-300"
                onclick="formAjax(event, '#salvar_cadastrar')">
                Enviar
            </button>


        </form>

        <!-- Seção de Pagamento via PIX -->
        <div x-show="true" x-transition.opacity class="mt-8">
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold">Pagamento via PIX</h2>
                <button class="text-gray-400 hover:text-blue-500" onclick="copyLink()">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
            <p class="mt-2 text-gray-700 text-center">Por favor, use o código abaixo para realizar o pagamento via PIX:
            </p>
            <div class="bg-gray-100 p-4 border border-gray-300 rounded-md mt-2 text-center text-gray-900">
                <code id="pix-link"
                    class="break-all block max-w-full">https://www.gerarpix.com.br/pix?code=zPZDbnMdzsxwyvwLgVt4ye1v6KvAP2OOWJrxZ_JV3VLFuaaPDXa8-1xCJehzrZW8y5v_K0ihrzQACqeSVKGs55q5H4i9pAGc4YDh2g-BQhnd3jRqIBCqmZvWGPDrh2UK4nWP7n2_jdWCfw2pyajFVRc3z7ArasvPB1Zoorpq5mJ42irL8VCJsJB_dq0NO2TiC1wv3enCBultv39T4JmQN8oRMgeLPl03xga2YIjOF_Ho7h_UyX52rnZim3Dxfg</code>
            </div>
        </div>
    </div>
<script>
    
function formAjax(event, formSelector) {
    event.preventDefault(); // Prevenir redirecionamento

    // Obter o formulário usando o seletor
    const form = document.querySelector(formSelector);

    // Obter a rota a partir do atributo data-route do formulário
    const route = form.dataset.route; // Certifique-se de que o formulário tem o atributo data-route

    $.ajax({
        url: route, // Utilize a rota do formulário
        method: 'POST',
        data: $(form).serialize(), // Dados do formulário
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: response.message,
            }).then(() => {
                // Redirecionar após fechar o modal de sucesso
                window.location.href = response
                .redirect; // Redireciona para a rota de dashboard
            });
        },
        error: function(xhr) {
            let errorMessage = 'Ocorreu um erro ao salvar.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message; // Mensagem de erro do backend
            }
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: errorMessage,
            });
        }
    });
}
</script>
</x-app-layout>
