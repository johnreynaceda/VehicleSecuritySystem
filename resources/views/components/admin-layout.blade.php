<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <x-shared.background class="h-[90rem] fixed -right-96 -top-60 2xl:opacity-100 opacity-30" />
    <div class="bg-white border-b relative">
        <livewire:navbar />
    </div>
    <main class="mx-auto max-w-7xl 2xl:py-10 py-5 relative">
        <header class="font-bold 2xl:text-3xl text-2xl mx-2 2xl:mx-0 text-green-600 uppercase">@yield('title')
        </header>
        <div class="2xl:mt-10 mt-5">
            {{ $slot }}
        </div>
    </main>
    <x-dialog z-index="z-50" blur="md" align="center" />
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
