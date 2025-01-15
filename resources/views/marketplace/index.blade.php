<x-layout>
    <h2>Welcome to our marketplace</h2>
    <a href="marketplace/my">My shop</a>
    <section class="dashboard">
        <ul>
            @foreach ($products as $product)
                <li class="product">
                    {{-- ATTENTION: in this case I can't use the double quotes
                     to get the product's field or they'll create a conflict
                     with the ones of the href. Single quote must be used. --}}
                    <x-card href="marketplace/{{ $product['id'] }}">
                        <h3>{{ $product["name"] }}</h3>
                        <p>{{ $product["price"] }}</p>
                    </x-card>
                </li>
            @endforeach
        </ul>
    </section>
</x-layout>