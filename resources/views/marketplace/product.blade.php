<x-layout>
    <div class="product-page">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        <button class="btn">Add to cart</button>
    </div>
</x-layout>