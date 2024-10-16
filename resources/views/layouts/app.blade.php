<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Torneio Warriors of Valhalla</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite([
      'resources/css/app.css',
                'resources/css/auth.css',
                'resources/css/bracket.scss',
                'resources/js/app.js',
                'resources/js/brackets.js',
    ])
</head>
<body class="font-sans text-dark-100 antialiased">
    <div class="min-h-screen bg-gray-900 text-white">
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
</html>
