<x-app-layout>
    <div class="max-w-[700px] mx-auto flex justify-end mt-6">
        <a href="{{ route('dashboard') }}"
            class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded-md transition duration-300">
            Voltar
        </a>
    </div>

    <br>

    <div class="max-w-[700px] mx-auto p-6 bg-white rounded-lg shadow-lg" x-data="{
        paymentType: '',
        showDescription: false,
        nicknameTeam: '',
        showAlert: false
    }" x-init="paymentType = ''">

        <h1 class="text-2xl font-bold text-center bg-white p-4 text-black rounded-t-lg">
            Bem-vindo, {{ Str::ucfirst($user->name) }}
        </h1>

        <p class="mt-4 text-black text-center">
            Por favor, preencha os dados do seu cadastro no torneio
        </p>

        <!-- Formulário com Grid Layout -->
        <form action="{{ route('cadastrar') }}" method="POST" enctype="multipart/form-data" id="salvar_cadastrar" data-route="{{ route('cadastrar') }}">

            @csrf
            <input type="hidden" name="user_id" id="user_id" required value="{{ auth()->id() }}">

            <div class="grid grid-cols-1 gap-4 mt-4">

                <!-- Seu Nickname -->
                <div>
                    <label for="nickname_user" class="block text-black">Seu Nickname:</label>
                    <input type="text" name="nickname_user" id="nickname_user" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nickname">
                </div>

                <!-- Telefone de Contato -->
                <div>
                    <label for="contact_phone" class="block text-black">Telefone de Contato:</label>
                    <input type="tel" name="contact_phone" id="contact_phone" required minlength="14" maxlength="15"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="(XX) XXXXX-XXXX">
                </div>

                <!-- Discord -->
                <div>
                    <label for="discord" class="block text-black">Discord:</label>
                    <input type="text" name="discord" id="discord" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Usuário#1234">
                </div>
            </div>

            <!-- Seção de Seleção de Pagamento -->
            <div class="mt-6">
                <label class="block text-black text-lg font-semibold">Método de Pagamento:</label>

                <div class="flex items-center space-x-4 mt-2">
                    <!-- Opção de pagamento com Live Pix -->
                    <label class="flex items-center">
                        <input type="radio" name="payment_type" value="live_pix" x-model="paymentType" 
                               class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-black">Pagar com Live Pix</span>
                    </label>

                    <!-- Opção de pagamento com QR Code -->
                    <label class="flex items-center">
                        <input type="radio" name="payment_type" value="qrcode" x-model="paymentType" 
                               class="form-radio text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-black">Pagar com QR Code com valor fixo</span>
                    </label>
                </div>

                <!-- Descrição do Pagamento -->
                <div x-show="paymentType !== ''" x-transition class="mt-4">
                    <div class="p-4 bg-yellow-100 border border-gray-300 rounded-md text-black shadow">
                        <h2 class="text-lg font-semibold">Descrição do Pagamento</h2>
                        <p>Torneio of Valhalla</p>
                        <p>Preço: R$ 10,00</p>
                        <p class="text-dark-600 font-bold">O pagamento é individual por menbro de equipe</p>
                    </div>
                </div>
            </div>

            <!-- Exibir o PIX ou Live PIX baseado na seleção -->
            <div x-show="paymentType === 'qrcode'" x-transition.opacity class="mt-4">
                <div class="bg-gray-100 p-4 border border-gray-300 rounded-md text-center text-black">
                    <p>Código QR para pagamento:</p>
                    <img src="{{ asset('asset/itens/qrcode.png') }}" alt="QR Code" class="mx-auto mt-2" />
                </div>
            </div>

            <div x-show="paymentType === 'live_pix'" x-transition.opacity class="mt-4">
                <div class="bg-gray-100 p-4 border border-gray-300 rounded-md text-center text-black">
                    <p>Clique abaixo para gerar o código Live Pix:</p>
                    <a href="https://livepix.gg/guilhermevianaplay" id="pix-link" class="block break-all max-w-full text-blue-500 underline">
                        https://livepix.gg/guilhermevianaplay
                    </a>
                </div>
            </div>

            <button type="button"
                class="mt-6 w-full bg-black text-white px-4 py-2 rounded-md
                       hover:bg-gray-800 transition duration-300"
                onclick="showConfirmation(event)">
                Enviar
            </button>
        </form>
    </div>

    <script>
          // Função para aplicar a máscara no telefone de contato
          function aplicarMascaraTelefone(event) {
            const input = event.target;
            let valor = input.value.replace(/\D/g, ''); // Remove tudo que não for dígito
            const comprimento = valor.length;

            if (comprimento <= 10) {
                // Aplica a máscara (XX) XXXX-XXXX para números com até 10 dígitos
                valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
                valor = valor.replace(/(\d{4})(\d{1,4})$/, "$1-$2");
            } else {
                // Aplica a máscara (XX) XXXXX-XXXX para números com 11 dígitos
                valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2");
                valor = valor.replace(/(\d{5})(\d{1,4})$/, "$1-$2");
            }

            input.value = valor; // Atualiza o valor no campo
        }

        // Adiciona o evento de input para aplicar a máscara enquanto o usuário digita
        document.getElementById('contact_phone').addEventListener('input', aplicarMascaraTelefone);

        // Função de confirmação de pagamento com SweetAlert (permanece igual)
        function showConfirmation(event) {
            event.preventDefault(); // Prevenir o envio automático do formulário

            Swal.fire({
                title: 'Confirmação de Pagamento',
                text: 'Você confirmou o pagamento. Todos os registros do sistema vão passar por uma triagem para validar o pagamento e os seus dados serão confirmados por telefone. Você receberá uma mensagem de confirmação em breve.',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Confirmar e enviar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    formAjax(event, '#salvar_cadastrar'); // Envia os dados após a confirmação
                }
            });
        }

        // Função de envio AJAX (permanece igual)
        function formAjax(event, formSelector) {
            const form = document.querySelector(formSelector);
            const route = form.dataset.route;

            // Realiza o envio do formulário via AJAX
            fetch(route, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            }).then(response => response.json())
            .then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: 'Dados enviados com sucesso!',
                }).then(() => {
                    window.location.href = 'dashboard';
                });
            }).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Ocorreu um erro ao enviar os dados.',
                });
            });
        }

    </script>
</x-app-layout>
