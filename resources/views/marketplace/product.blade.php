<x-layout>
    <header>
        <p>Product page</p>
    </header>
    <section class="dashboard">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p class="price-tag"><strong>{{ $product->price }}</strong></p>
    </section>
</x-layout>