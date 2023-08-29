<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/notyf.min.css') }}">

    @vite('resources/css/app.css')

    @yield('head')
</head>

<body class="bg-gray-50">

    <x-alert></x-alert>

    @yield('content')
</body>

@stack('notyf')

</html>
