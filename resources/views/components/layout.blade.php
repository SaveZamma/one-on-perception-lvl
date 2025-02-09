<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>One On Perception</title>
        @vite('resources/css/app.css')
    </head> 
    <body>
        <nav class="top-navbar">
            <h1 class="primary" style="">One On Perception</h1>
            {{-- <a href="{{ route('marketplace.index')}}">Marketplace</a> --}}
        </nav>

        <main class="container">
            {{ $slot }}
        </main>

        <footer>
            <p>One On Perception &copy; 2025</p>
        </footer>
    </body>
</html>