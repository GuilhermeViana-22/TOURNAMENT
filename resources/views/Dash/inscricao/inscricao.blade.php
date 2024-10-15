<x-app-layout>
    <div class="max-w-[700px] mx-auto p-2 bg-white rounded-lg shadow-lg" x-data="{ showPayment: false }" x-init="showPayment = true">
        <h1 class="text-2xl font-bold text-center bg-gray-600 p-4">Bem-vindo, {{Str::ucfirst( $user->name) }}</h1>
        <p class="mt-4 text-gray-700 text-center">
            Por favor, informe os seguintes nicknames:
        </p>
        <div class="mt-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 text-justify">
            <strong>Atenção!</strong> Você deve informar:
            <ul class="list-disc list-inside mt-2">
                <li>Seu nickname</li>
                <li>Nickname do amigo</li>
                <li>Nickname da equipe</li>
                <li>O pagamento do participante é individual</li>
            </ul>
        </div>
        
        <!-- Formulário para preencher os nicknames -->
        <form action="{{ route('cadastrar') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="nickname_user" class="block text-gray-700">Seu Nickname:</label>
                <input type="text" name="nickname_user" id="nickname_user"  required class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900" placeholder="nickmane">
            </div>
            
            <div class="mb-4">
                <label for="nickname_team" class="block text-gray-700">Nickname da Equipe:</label>
                <input type="text" name="nickname_team" id="nickname_team" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md text-gray-900"  placeholder="nome da equipe">
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition text-center">Enviar</button>
        </form>

        <div x-show="showPayment" x-transition.opacity class="mt-8">
            <h2 class="text-lg font-semibold text-center">Pagamento via PIX</h2>
            <p class="mt-2 text-gray-700 text-center">Por favor, use o código abaixo para realizar o pagamento via PIX:</p>
            <div class="bg-gray-100 p-4 border border-gray-300 rounded-md mt-2 text-center text-gray-900">
                <code>codigo-pix-aqui</code>
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
