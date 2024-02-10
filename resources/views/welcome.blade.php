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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased relative">
    <x-shared.background class="h-[90rem] absolute -right-96 -top-60 2xl:opacity-100 opacity-30" />
    <section class="relative overflow-hidden bg-white/5">
        <div class="relative w-full mx-auto max-w-7xl">
            <div class="relative flex flex-col w-full p-5 mx-auto lg:px-16 md:flex-row md:items-center md:justify-between md:px-6"
                x-data="{ open: false }">
                <div class="flex flex-row items-center justify-between text-sm text-black lg:justify-start">
                    <a href="/">
                        <img src="{{ asset('images/sksu_logo.png') }}" class="h-16 " alt="">
                    </a><button @click="open = !open"
                        class="items-center justify-center focus:outline-none inline-flex focus:text-black hover:text-[#0000ff] md:hidden p-2 text-black">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16M4 18h16" :class="{ 'hidden': open, 'inline-flex': !open }"
                                class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            </path>
                            <path d="M6 18L18 6M6 6l12 12" :class="{ 'hidden': !open, 'inline-flex': open }"
                                class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:flex md:flex-row md:justify-end md:pb-0 md:space-x-6">
                    <a class="py-2 text-sm font-medium text-slate-600 hover:text-green-600" href="#_">Home</a>
                    <a class="py-2 text-sm font-medium text-slate-600 hover:text-green-600" href="#_">About Us</a>
                    <a class="py-2 text-sm font-medium text-slate-600 hover:text-green-600" href="#_">Feautures</a>
                    <a class="py-2 text-sm font-medium text-slate-600 hover:text-green-600" href="#_">Fees</a> <a
                        class="py-2 text-sm font-medium text-slate-600 hover:text-green-600" href="#_">Contact
                        Us</a>

                </nav>
            </div>
        </div>
    </section>
    <section class="relative flex items-center w-full ">
        <div class="relative items-center w-full px-5 py-24 mx-auto lg:px-16 lg:py-36 max-w-7xl md:px-12">
            <div class="relative flex-col items-start m-auto align-middle">
                <div class="grid grid-cols-1 gap-6 lg:gap-24 lg:grid-cols-2">
                    <div class="relative items-center gap-12 m-auto lg:inline-flex">
                        <div class="max-w-xl text-center lg:text-left">
                            <div>
                                <p class="text-3xl font-medium md:text-6xl text-slate-500">
                                    <span class="text-green-600 font-protest font-bold">VEHICLE</span> Security
                                    Management System
                                </p>
                                <p class="mt-4 text-lg tracking-tight text-slate-500 lg:text-xl">
                                    A vehicle security system is a comprehensive solution designed to safeguard
                                    automobiles from theft and unauthorized access.
                                </p>
                            </div>
                            <div class="flex flex-col items-center gap-3 mt-10 lg:flex-row">
                                <a class="inline-flex items-center justify-center w-full px-6 py-4 text-center text-green-600 duration-200   border-2 border-green-600 focus:outline-none hover:bg-transparent hover:bg-green-500 hover:text-white lg:w-auto rounded-xl"
                                    href="{{ route('login') }}">
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M18.71 9.49c-.1 0-.2-.02-.3-.06a.76.76 0 01-.39-.99c.19-.43.08-1.06-.27-1.58-.35-.53-.88-.88-1.37-.86-.44 0-.75-.33-.76-.74 0-.42.33-.75.74-.76 1.03-.02 2 .57 2.63 1.52.64.96.79 2.11.4 3.01-.11.29-.39.46-.68.46z">
                                        </path>
                                        <path
                                            d="M21.82 10.48c-.07 0-.13-.01-.2-.03a.745.745 0 01-.52-.92c.38-1.36.06-2.98-.85-4.34-.91-1.36-2.29-2.27-3.7-2.44a.744.744 0 01-.65-.83c.05-.41.43-.71.83-.65 1.83.22 3.61 1.38 4.76 3.1 1.15 1.72 1.54 3.8 1.05 5.58-.09.31-.39.53-.72.53z">
                                        </path>
                                        <path
                                            d="M17.52 15.84c-.11-1.22-.44-2.53-2.82-2.53H5.23c-2.38 0-2.7 1.31-2.82 2.53l-.42 4.52c-.05.56.14 1.13.52 1.55.39.43.95.68 1.54.68h1.39c1.2 0 1.43-.69 1.58-1.14l.15-.44c.17-.51.21-.64.88-.64h3.8c.66 0 .69.07.88.64l.15.45c.15.45.38 1.14 1.58 1.14h1.39c.59 0 1.15-.25 1.54-.68.38-.42.57-.99.52-1.55l-.39-4.53z"
                                            opacity=".4"></path>
                                        <path
                                            d="M16.65 11.09h-.76l-.28-1.35c-.27-1.3-.82-2.49-3.03-2.49H7.37c-2.21 0-2.77 1.19-3.03 2.49l-.28 1.35H3.3a.56.56 0 100 1.12h.53l-.31 1.48c.4-.23.96-.37 1.73-.37h9.47c.77 0 1.33.14 1.73.37l-.31-1.48h.53c.31 0 .56-.25.56-.56a.59.59 0 00-.58-.56zM7.75 17.39H5.52a.56.56 0 110-1.12h2.23c.31 0 .56.25.56.56-.01.31-.25.56-.56.56zM14.43 17.39H12.2a.56.56 0 110-1.12h2.23c.31 0 .56.25.56.56-.01.31-.26.56-.56.56z">
                                        </path>
                                    </svg>
                                    <span class="ml-3 font-semibold">Get Started</span></a>

                            </div>

                        </div>
                    </div>
                    <div class="block w-full mt-12 lg:mt-0">
                        {{-- <img alt="hero"
                            class="object-cover object-center w-full mx-auto drop-shadow-xl lg:ml-auto rounded-2xl"
                            src="https://leaddelta.com/wp-content/uploads/2022/12/home-hero.svg"> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative overflow-hidden bg-white">
        <div class="relative w-full mx-auto py-12 max-w-7xl">
            Other infos...
        </div>
    </section>

</body>

</html>
