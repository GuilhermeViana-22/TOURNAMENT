<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('logo/shodwe_sem_fundo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <title>Torneio Warrios of Valhalla</title>

    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('dist/assets/app-C-mq5tJn.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/bracket-Chvo6Fgw.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-components.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-base.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-utilities.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans text-dark-100 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0"
    style="background-image: url('{{ asset('hero/background.png') }}'); background-size: cover; background-position: center; background-color: #2d2d2d;">
        <div>
            <img src="{{ asset('logo/shodwe_sem_fundo.png') }}" style="max-width: 300px">
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Scripts -->
<script src="{{ asset('dist/assets/app-C5iY3TvR.js') }}" defer></script>
<script src="{{ asset('dist/assets/bracket-Chvo6Fgw.js') }}" defer></script>
<script src="{{ asset('dist/assets/main-DnNZgA1n.js') }}" defer></script>
<script src="{{ asset('dist/assets/toast.js') }}" defer></script>
<script src="{{ asset('dist/assets/sweetalert2-DDv3NVa1.js') }}" defer></script>
</html>
