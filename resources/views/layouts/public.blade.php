<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500&family=Lora:wght@600&display=swap"
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

    <div class="relative bg-white shadow">
        <div class="mx-auto max-w-7xl px-6">
            <x-public.desktop-navigation></x-public.desktop-navigation>
        </div>

        <x-public.mobile-navigation />

    </div>

    <main class="lg:relative">
        {{ $slot }}
    </main>

    <x-public.footer />

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
