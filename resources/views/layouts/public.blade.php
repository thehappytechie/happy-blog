<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @stack('simpleMDECss')

    <link rel="stylesheet" href="{{ asset('css/notyf.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/highlight.css') }}">

    @vite('resources/css/app.css')
</head>

<body x-data="{ open: false }" x-cloak class="bg-gray-50">

    <x-alert></x-alert>

    <script>
        window.axeptioSettings = {
            clientId: "652e86bb62524366709c9680",
        };

        (function(d, s) {
            var t = d.getElementsByTagName(s)[0],
                e = d.createElement(s);
            e.async = true;
            e.src = "//static.axept.io/sdk.js";
            t.parentNode.insertBefore(e, t);
        })(document, "script");
    </script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div x-data="{ open: false }" @keydown.window.escape="open = false">
        <div class="relative bg-white shadow">
            <div class="mx-auto max-w-7xl px-6">
                <x-public.desktop-navigation></x-public.desktop-navigation>
            </div>

            <x-public.mobile-navigation></x-public.mobile-navigation>

        </div>

        <div class="bg-white py-20 sm:py-20">
            {{ $slot }}
        </div>

        <x-public.footer />

    </div>

    @livewireScripts

    @stack('notyf')

    @stack('simpleMDE')

    @stack('highlightJs')

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
