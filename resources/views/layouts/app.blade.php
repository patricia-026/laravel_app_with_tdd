<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-grey-light">
    <div id="app">
        <nav class="bg-white">
            <div class="container mx-auto section">
                <div class="flex justify-between items-center py-2">
                    <h1>
                        <a class="navbar-brand text-3xl" href="{{ url('/projects') }}">
                            <img src="/images/logo.svg" alt="Birdboard">
                        </a>
                    </h1>
                    <button>Dropdown</button>
                </div>
            </div>
        </nav>

        <main class="container mx-auto section py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
