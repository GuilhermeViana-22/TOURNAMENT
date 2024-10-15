<x-app-layout>
    <div class="max-w-[700px] mx-auto p-6 bg-white rounded-lg shadow-lg" 
         x-data="{ 
            nicknameTeam: '', 
            alertMessage: '', 
            alertStatus: '', 
            showAlert: false 
         }" 
         x-init="nicknameTeam = ''">
        
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
        <form @submit.prevent="submitForm" class="mt-6">
            @csrf
            
            <input type="hidden" name="user_id" id="user_id" required value="{{ auth()->id()}}">
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
                <input type="text" name="nickname_team" id="nickname_team" required 
                       x-model="nicknameTeam" 
                       class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900 
                              focus:outline-none focus:ring-2 focus:ring-blue-500"  
                       placeholder="Nome da equipe">
            </div>
            
            <!-- Campos Adicionais (Nome do Duo, Telefone, Discord) -->
            <div x-show="nicknameTeam.trim() !== ''" 
                 x-transition 
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
            
            <button type="submit" 
                    class="mt-6 w-full bg-blue-500 text-white px-4 py-2 rounded-md 
                           hover:bg-blue-600 transition duration-300">
                Enviar
            </button>
        </form>
        
        <!-- Seção de Pagamento via PIX -->
        <div x-show="true" x-transition.opacity class="mt-8">
            <h2 class="text-lg font-semibold text-center">Pagamento via PIX</h2>
            <p class="mt-2 text-gray-700 text-center">Por favor, use o código abaixo para realizar o pagamento via PIX:</p>
            <div class="bg-gray-100 p-4 border border-gray-300 rounded-md mt-2 text-center text-gray-900">
                <code>codigo-pix-aqui</code>
            </div>
        </div>

        <!-- Alerta de Sucesso ou Erro -->
        <div x-show="showAlert" 
             x-transition 
             class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-white border border-gray-300 rounded-md shadow-md p-4 w-96 z-50"
             :class="{'bg-green-100 text-green-700': alertStatus === 'success', 'bg-red-100 text-red-700': alertStatus === 'error'}">
            <p x-text="alertMessage"></p>
            <button @click="showAlert = false" class="mt-2 text-sm underline">Fechar</button>
        </div>
    </div>

    <!-- Importação do Alpine.js e SweetAlert -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function submitForm() {
            const formData = new FormData(event.target); // Captura o formulário enviado
    
            fetch("{{ route('cadastrar') }}", {
                method: "POST",
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Adiciona o token CSRF
                }
            })
            .then(response => {
                if (!response.ok) {
                    // Tenta capturar a resposta de erro do Laravel
                    return response.json().then(err => {
                        throw new Error(err.message || 'Erro ao criar o time.'); // Verifica se há uma mensagem de erro
                    });
                }
                return response.json(); // Retorna os dados em formato JSON
            })
            .then(data => {
                // Exibe mensagem de sucesso usando SweetAlert
                Swal.fire({
                    title: 'Sucesso!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });

                setTimeout(() => {
        window.location.href = '/dashboard';
    }, 3000);
            })
            .catch(error => {
                // Exibe mensagem de erro usando SweetAlert
                Swal.fire({
                    title: 'Erro!',
                    text: error.message,
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            });
        }
    </script>
    
</x-app-layout>
