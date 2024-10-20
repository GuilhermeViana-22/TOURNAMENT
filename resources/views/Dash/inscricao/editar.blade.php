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
            Bem-vindo, de volta {{ Str::ucfirst($user->name) }}
        </h1>

        <p class="mt-4 text-black text-center">
          Aqui você atualiza seus dados de cadastro
        </p>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <!-- Formulário com Grid Layout -->
        <form action="{{ route('atualizar') }}" method="POST" enctype="multipart/form-data" id="salvar_atualizar" data-route="{{ route('atualizar') }}">

            @csrf
            <input type="hidden" name="user_id" id="user_id" required value="{{ auth()->id() }}">

            <div class="grid grid-cols-1 gap-4 mt-4">

                <!-- Seu Nickname -->
                <div>
                    <label for="nickname_user" class="block text-black">Seu Nickname:</label>
                    <input type="text" name="nickname_user" id="nickname_user" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Nickname" value="{{ old('nickname_user', $register->nickname_user) }}">
                </div>

                <!-- Telefone de Contato -->
                <div>
                    <label for="contact_phone" class="block text-black">Telefone de Contato:</label>
                    <input type="tel" name="contact_phone" id="contact_phone" required minlength="14" maxlength="15"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="(XX) XXXXX-XXXX" value="{{ old('contact_phone', $register->contact_phone) }}">
                </div>

                <!-- Discord -->
                <div>
                    <label for="discord" class="block text-black">Discord:</label>
                    <input type="text" name="discord" id="discord" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-black
                              focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Usuário#1234" value="{{ old('discord', $register->discord) }}">
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
              title: 'Confirmação de atualização de dados cadastrais',
              text: 'Você confirmou a sua atualização ?.',
              icon: 'info',
              showCancelButton: true,
              confirmButtonText: 'Confirmar e enviar',
              cancelButtonText: 'Cancelar',
          }).then((result) => {
              if (result.isConfirmed) {
                  formAjax(event, '#salvar_atualizar'); // Envia os dados após a confirmação
              }
          });
      }

      // Função de envio AJAX (permanece igual)
      function formAjax(event, formSelector) {
          const form = document.querySelector(formSelector);
          const route = form.dataset.route;
        console.log(form)
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
                  text: 'Dados editados com sucesso!',
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
