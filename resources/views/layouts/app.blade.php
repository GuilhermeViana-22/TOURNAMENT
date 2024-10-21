<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{  asset('logo/shodwe_sem_fundo.png')  }}">
    <title>Torneio Warriors of Valhalla</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="{{ asset('dist/assets/app-C-mq5tJn.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/bracket-Chvo6Fgw.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-all.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-components.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-base.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/tailwind-utilities.css') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>

<body class="font-sans text-dark-100 antialiased">
    <div class="min-h-screen bg-gray-100 text-white">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-white">{{ $header }}</h1> <!-- Mantendo texto branco para o header -->
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="p-6">
            {{ $slot }}
        </main>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</html>
