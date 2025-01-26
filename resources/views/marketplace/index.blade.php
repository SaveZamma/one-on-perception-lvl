<x-layout>
    <h2>Welcome to our marketplace</h2>
    <a href="marketplace/my">My shop</a>
    <section class="dashboard">
        <ul>
            @foreach ($products as $product)
                <li class="product">
                    <x-card href="{{ route('marketplace.product', ['id' => $product['id']]) }}">
                        <h3>{{ $product["name"] }}</h3>
                        <p>{{ $product["price"] }}</p>
                    </x-card>
                </li>
            @endforeach
        </ul>

        {{ $products->links() }}
    </section>
</x-layout>