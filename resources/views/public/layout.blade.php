<!DOCTYPE html>
<html lang="nl" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Snelle Slenteraars')</title>
    @vite('resources/css/app.css')
</head>
<body class="min-h-full bg-gray-50 text-gray-800">

    <header class="bg-green-700 text-white">
        <div class="max-w-6xl mx-auto p-4">
            <a href="{{ route('home') }}" class="text-2xl font-bold">Snelle Slenteraars</a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
</html>
