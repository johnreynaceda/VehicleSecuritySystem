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

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-gray-900 antialiased relative ">

    @if (request()->routeIs('login'))
        <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white">
            <div class=" bottom-5 left-5">
                <h1 class="font-bold 2xl:text-4xl text-2xl text-green-600 opacity-50">SULTAN KUDARAT STATE UNIVERSITY
                </h1>
            </div>
            <x-shared.background class="h-[90rem] absolute -right-96 -top-60 2xl:opacity-100 opacity-30" />
            <div class="relative">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-5 relative bg-white shadow-2xl overflow-hidden sm:rounded-lg">
                <h1 class="text-green-600 text-3xl text-center w-full font-protest font-bold">VEHICLE</h1>
                <p class="text-xl font-medium  text-center text-slate-500">
                    Security
                    Management System
                </p>
                <div class="mt-10">
                    {{ $slot }}
                </div>
            </div>
        </div>
    @else
        <livewire:register-user />
    @endif
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
