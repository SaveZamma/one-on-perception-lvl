<x-layout>
    <header>
        <p>Welcome to our marketplace</p>
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
</x-layout>