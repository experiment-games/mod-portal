<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-200 flex flex-col min-h-screen">
    <header class="bg-slate-800 text-white">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl">{{ config('app.name') }}</h1>
        </div>
    </header>

    <main class="container mx-auto p-4 flex-1 flex flex-col md:gap-8 gap-4">
        {{ $slot }}
    </main>

    <footer class="bg-slate-800 text-white">
        <div class="container mx-auto p-4">
            <p>&copy; {{ date('Y') }} experiment.games</p>
        </div>
    </footer>

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>
