<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <!-- Título da Página -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-black">Cria a equipe 2x2</h2>
            <a href="{{ route('dashboard') }}" class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded-md transition duration-300">
                Voltar
            </a>
        </div>
        <!-- Mensagem de Sucesso -->
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Formulário -->
        <form action="{{ route('duo') }}" method="POST" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
            @csrf
            <!-- Campo: Nome da Equipe -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome da Equipe</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Digite o nome da equipe" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-300 ease-in-out" 
                    required
                >
            </div>

            <!-- Campo: Selecionar Companheiro -->
            <div class="mb-6">
                <label for="member_id" class="block text-gray-700 text-sm font-bold mb-2">Selecionar Companheiro de Equipe</label>
                <select 
                    name="member_id" 
                    id="member_id" 
                    class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 transition duration-300 ease-in-out"
                    required
                >
                    <option value="">-- Escolha o membro da equipe --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botão de Criar Equipe -->
            <div class="flex items-center justify-between">
                <button 
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 ease-in-out"
                >
                    Criar Equipe
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
