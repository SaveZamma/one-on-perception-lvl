<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>One On Perception</title>
    </head>
    <body>
        <header>
            <nav>
                <h1>One On Perception</h1>
                <a href="marketplace">Marketplace</a>
            </nav>
        </header>

        <main class="container">
            {{ $slot }}
        </main>

    </body>
</html>