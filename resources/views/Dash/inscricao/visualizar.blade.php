<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-7 py-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-black">Minha Inscrição</h2>
            <a href="{{ route('dashboard') }}" class="bg-white hover:bg-gray-200 text-black font-bold py-2 px-4 rounded-md transition duration-300">
                Voltar
            </a>
        </div>
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-4 px-6 border text-lg text-black">Protocolo</th>
                    <th class="py-4 px-6 border text-lg text-black">Nickname</th>
                    <th class="py-4 px-6 border text-lg text-black">Telefone de Contato</th>
                    <th class="py-4 px-6 border text-lg text-black">Discord</th>
                    <th class="py-4 px-6 border text-lg text-black">Tipo de Pagamento</th>
                    <th class="py-4 px-6 border text-lg text-black">Criado em</th>
                    <th class="py-4 px-6 border text-lg text-black">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-200 transition duration-300">
                    <td class="py-2 px-4 border text-lg text-black">{{ '#'.$Register['user_id'] }}</td>
                    <td class="py-2 px-4 border text-lg text-black">{{ $Register['nickname_user'] }}</td>
                    <td class="py-2 px-4 border text-lg text-black">{{ $Register['contact_phone'] }}</td>
                    <td class="py-2 px-4 border text-lg text-black">{{ $Register['discord'] }}</td>
                    <td class="py-2 px-4 border text-lg text-black">{{ $Register['payment_type'] }}</td>
                    <td class="py-2 px-4 border text-lg text-black">{{ \Carbon\Carbon::parse($Register['created_at'])->format('d/m/Y H:i') }}</td>
                    <td class="py-2 px-4 border text-lg text-black">
                        <div class="flex space-x-2">
                            <a href="{{ route('editar', ['id' => $Register->id]) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-2 py-1 rounded">Alterar</a>
                            <form action="{{ route('deletar') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="id" value="{{ $Register->user_id }}">
                                <button type="button" class="bg-red-500 hover:bg-red-600 text-white text-sm px-2 py-1 rounded" onclick="confirmDelete(this.form)">Deletar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    
        <!-- Card da equipe -->
        @if ($team) <!-- Verifica se a equipe existe -->
            <div class="mt-8 p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-black">Detalhes da Equipe: {{ $team->name }}</h3>
                <p class="mt-2 text-gray-600">Membros:</p>
                <ul class="mt-2 list-disc list-inside text-gray-700">
                    <!-- Adicione aqui os membros da equipe, se necessário -->
                </ul>
                <p class="mt-2 text-gray-600">Criada em: {{ \Carbon\Carbon::parse($team->created_at)->format('d/m/Y H:i') }}</p>
            </div>
        @else
            <p class="mt-8 text-red-600">Você ainda não está registrado em nenhuma equipe.</p>
        @endif

        <!-- Seção do Grupo do WhatsApp -->
        <div class="mt-8 p-6 bg-white rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-black">Entre no nosso grupo do WhatsApp!</h3>
            <img src="{{ asset('logo/shodwe_sem_fundo.png') }}" alt="Logo" class="max-w-xs mx-auto my-4">
            <p class="text-gray-600 text-center">Participe do Torneio Valhalla e fique por dentro de todas as novidades!</p>
            <div class="text-center mt-4">
                <a href="https://chat.whatsapp.com/KL58sNMz073KpiFoWk35h2" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md transition duration-300">
                    Entrar no Grupo
                </a>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-data="{ open: false }" class="fixed z-10 inset-0 overflow-y-auto" aria-hidden="true" x-show="open">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" x-show="open">
                <div class="absolute inset-0 bg-black opacity-30"></div>
            </div>
            <div class="inline-block w-full max-w-md p-6 my-8 bg-white rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold">Detalhes do Registro</h3>
                <p class="mt-2 text-gray-600">Aqui você pode visualizar os detalhes do registro.</p>
                <div class="mt-4">
                    <button @click="open = false" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(form) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Ao realizar a exclusão do cadastro, os dados serão perdidos e você perderá a sua oportunidade de aparecer no torneio. Caso o valor tenha sido pago, favor entrar em contato com o streamer ou com a equipe que está gerenciando o campeonato para análise e devolução do valor.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Não, cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Envia o formulário se o usuário confirmar
            }
        });
    }
</script>

<style>
    table th {
        background-color: #e3d4e9; /* cor de fundo dos cabeçalhos */
    }

    table tr:hover {
        background-color: #e5e7eb; /* cor de fundo ao passar o mouse */
    }

    button {
        transition: background-color 0.3s ease;
    }
</style>
