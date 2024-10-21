<nav x-data="{ open: false }" class="bg-purple-600 dark:bg-gray-800 border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex">
                    <img src="{{ asset('logo/shodwe_sem_fundo.png') }}">
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                
                    @php
                        // Obtém o ID do usuário autenticado
                        $userId = auth()->id();
                    
                        // Verifica se o usuário já está na model Inscricao
                        $isUserInTeam = \App\Models\Inscricao::where('user_id', $userId)->exists();
                    @endphp
                
                    <x-nav-link :href="route($isUserInTeam ? 'visualizar' : 'inscricao')" :active="request()->routeIs($isUserInTeam ? 'visualizar' : 'inscricao')" class="text-white">
                        {{ $isUserInTeam ? __('Visualizar inscrição') : __('Minha inscrição') }}
                    </x-nav-link>
                
                    @if (!auth()->user()->hasTeam())
                        <x-nav-link :href="route('equipe')" :active="request()->routeIs('equipe')" class="text-white">
                            {{ __('Equipe') }}
                        </x-nav-link>
                    @endif
                
                    @php
                        // Obtém o total de equipes cadastradas
                        $totalEquipes = \App\Models\Team::count();
                
                        // Obtém o total de pessoas cadastradas
                        $totalPessoas = \App\Models\User::count();
                    @endphp
                
                    @if ($totalEquipes >= 16 && $totalPessoas > 16 && $totalPessoas % 2 === 0)
                        <x-nav-link :href="route('bracket')" :active="request()->routeIs('bracket')" class="text-white">
                            {{ __('Brackets') }}
                        </x-nav-link>
                    @else
                        <x-nav-link :href="route('espera')" :active="request()->routeIs('espera')" class="text-white">
                            {{ __('Aguarde') }}
                        </x-nav-link>
                    @endif
                </div>
                

            </div>

            <!-- Settings Dropdown -->
            <div class="sm:flex sm:items-center sm:ms-6">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-800 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="text-gray-200">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-300 hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-gray-300 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">


                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();"
                        class="text-white">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.classList.toggle('hidden');
    }

    window.onclick = function(event) {
        if (!event.target.matches('.inline-flex')) {
            const dropdowns = document.getElementsByClassName("absolute");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (!openDropdown.classList.contains('hidden')) {
                    openDropdown.classList.add('hidden');
                }
            }
        }
    }
</script>
