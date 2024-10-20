<x-app-layout>
    <div class="max-w-[700px] mx-auto flex justify-end mt-6">
        <a href="{{ route('dashboard') }}"
            class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded-md transition duration-300">
            Voltar
        </a>
    </div>

    <br>

    <div class="max-w-[700px] mx-auto p-6 bg-white rounded-lg shadow-lg" x-data="{
        showAlert: false
    }">
        <h1 class="text-2xl font-bold text-center bg-white p-4 text-black rounded-t-lg">
            Crie sua equipe 2x2
        </h1>

        <p class="mt-4 text-black text-center">
            Por favor, preencha os dados da equipe.
        </p>
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 mt-4" role="alert">
            <h3 class="font-bold">Atenção ao Escolher o Companheiro de Equipe!</h3>
            <p class="mt-2">
                Se o seu parceiro de equipe já tiver registrado os dados no torneio, o nome dele aparecerá na lista. 
                Certifique-se de selecionar o membro correto da equipe, pois essa escolha não poderá ser desfeita. 
              
               <b> <h1>Tome cuidado, pois essa ação é irreversível.</h1> </b>
            </p>
        </div>
        
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4  mt-4" role="alert">
            <h3 class="font-bold">Aviso Importante!</h3>
            <p class="mt-2">
                Após selecionar o membro da equipe, essa ação não poderá ser revertida. Isso impactará diretamente no sistema de brackets do torneio e na estrutura dos cards da equipe. 
                Escolha com cautela para garantir que o jogador correto seja atribuído à sua equipe.
            </p>
        </div>

        <!-- Formulário com Grid Layout -->
        <form action="{{ route('duo') }}" method="POST" enctype="multipart/form-data" id="criar_equipe" data-route="{{ route('duo') }}">
            @csrf

            <div class="grid grid-cols-1 gap-4 mt-4">

                <!-- Nome da Equipe -->
                <div>
                    <label for="name" class="block text-black">Nome da sua Equipe:</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Digite o nome da equipe">
                </div>

                <!-- Selecionar Companheiro de Equipe -->
                <div>
                    <label for="member_id" class="block text-black">Selecionar Companheiro de Equipe:</label>
                    <select name="member_id" id="member_id" required
                        class="block appearance-none w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Escolha o membro da equipe --</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <button type="button"
                class="mt-6 w-full bg-black text-white px-4 py-2 rounded-md
                       hover:bg-gray-800 transition duration-300"
                onclick="showConfirmation(event)">
                Criar Equipe
            </button>
        </form>
    </div>

    <script>
        function showConfirmation(event) {
            event.preventDefault(); // Previne o envio automático do formulário

            Swal.fire({
                title: 'Confirmação de Criação de Equipe',
                text: 'Você deseja criar a equipe com os dados preenchidos?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Confirmar e criar',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    formAjax(event, '#criar_equipe'); // Envia os dados após a confirmação
                }
            });
        }

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
                    text: 'Equipe criada com sucesso!',
                }).then(() => {
                    window.location.href = '{{ route("dashboard") }}'; // Redireciona após o sucesso
                });
            }).catch(error => {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: 'Ocorreu um erro ao criar a equipe.',
                });
            });
        }
    </script>
</x-app-layout>
