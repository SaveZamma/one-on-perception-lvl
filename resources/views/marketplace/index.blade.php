<x-layout>
    <h2>Welcome to our marketplace</h2>
    <a href="marketplace/my">My shop</a>
    <section class="dashboard">
        <ul>
            @foreach ($products as $product)
                <li class="product">
                    {{-- Note: I can also pass a custom or dynamic attribute --}}
                    <x-card href="marketplace/{{ $product['id'] }}" custom="customValue" :dynamic="$product['id'] < 2">
                        <h3>{{ $product["name"] }}</h3>
                        <p>{{ $product["price"] }}</p>
                    </x-card>
                </li>
            @endforeach
        </ul>
    </section>
</x-layout>