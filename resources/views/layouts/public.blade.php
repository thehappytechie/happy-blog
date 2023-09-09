<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/tom-select.css') }}" />

    @stack('filepondCss')

    @stack('simpleMDECss')

    <link rel="stylesheet" href="{{ asset('css/notyf.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/highlight.css') }}">

    @vite('resources/css/app.css')
</head>

<body x-data="{ open: false }" x-cloak class="bg-gray-50">

    <x-alert></x-alert>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="relative bg-white">
        <div class="relative bg-white shadow">
            <div class="mx-auto max-w-7xl px-6">
                <div class="flex items-center justify-between py-6 md:justify-start md:space-x-10">
                    <div class="flex justify-start lg:w-0 lg:flex-1">
                        <a href="{{ route('home') }}">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto sm:h-10"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        </a>
                    </div>
                    <div class="-my-2 -mr-2 md:hidden">
                        <button type="button" @click="open = ! open"
                            class="relative inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
                            aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>

                    <x-public.desktop-navigation/>

                    <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
                        <a href="#"
                            class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Join</a>
                    </div>
                </div>
            </div>

            <x-public.mobile-navigation/>

        </div>

        <main class="lg:relative">
            {{ $slot }}
        </main>

        <x-public.footer />

    </div>

    @livewireScripts

    @stack('notyf')

    @livewire('livewire-ui-modal')

    @stack('powergridJs')

    @stack('simpleMDE')

    @stack('filepondJs')

    @stack('highlightJs')

    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
