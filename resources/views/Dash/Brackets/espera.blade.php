<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
        <div class="text-center mb-6">
            <img src="{{ asset('logo/undraw_software_engineer_re_tnjc.svg') }}" alt="Software Engineer Illustration" class="w-1/2 mx-auto">
        </div>
        
        <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center justify-center mb-4">
                <!-- Spinner -->
                <svg class="animate-spin h-12 w-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v2a6 6 0 100 12v2a8 8 0 01-8-8z"></path>
                </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-800">Aguarde</h2>
            <p class="mt-2 text-gray-600">
                Para que os brackets funcionem corretamente, as equipes precisam formar um número par. 
                Esta primeira rodada será limitada ao número de pessoas, mas em futuras competições 
                poderemos organizar melhor para que mais equipes lutem juntas.
            </p>
        </div>
        {{-- aloha --}}
    </div>
</x-app-layout>
