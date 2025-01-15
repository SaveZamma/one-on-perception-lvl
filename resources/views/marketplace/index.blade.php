<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>One On Perception - Marketplace</title>

        <!-- Fonts -->

        <!-- Styles -->
        <!-- <link href="../css/app.css" rel="stylesheet" type="text/css"/> -->
    </head>
    <body>
        <header>
            <h1>One On Perception</h1>
            <p>Welcome to our marketplace!</p>
        </header>
        <section class="dashboard">
            <ul>
                @foreach ($products as $product)
                    <li class="product">
                        <a href="marketplace/{{ $product["id"] }}" class="product">
                            {{ $product["name"] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </body>
</html>