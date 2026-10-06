<!DOCTYPE html>
<html lang="nl" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600&family=Nunito:wght@400;600;700&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Snelle Slenteraars')</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex flex-col bg-creme text-schors font-sans">
    <header class="bg-mos-700 text-white">
        <div class="max-w-6xl mx-auto p-4">
            <a href="{{ route('home') }}" class="font-display text-2xl font-semibold">
                Snelle Slenteraars
            </a>
        </div>
    </header>
    <main class="flex-1">
        @yield('content')
    </main>
    <x-footer />
</body>

</html>
