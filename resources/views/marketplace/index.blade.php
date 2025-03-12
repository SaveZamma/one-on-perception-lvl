<x-layout>
    @vite('resources/css/marketplace.css')

    {{-- <a href="marketplace/my">My shop</a> --}}
    <section class="promotion">
        <h2>Our best deals</h2>
        <div class="banner"
        style="background-image: url(https://picsum.photos/800); background-size: cover;">
    </div>
</section>

<section class="dashboard">
        <h2>Shop by category</h2>        
        <div class="search">
            <select id="product-category" name="category">
                <option value="all">All</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="food">Food</option>
            </select>
            <input type="text" placeholder="Search for products"/>
        </div>

        <ul class="products-list">
        @foreach ($products as $product)
            <li class="product card-no-border"
                style="background-image: url(https://picsum.photos/800); background-size: cover;"
                {{-- style="background-image: url({{ $product["image"] }})" --}}
            >
            <div class="card-title-container fx-col">
                <h3>{{ $product["name"] }}</h3>
                <div class="fx-row fx-space-between">
                    <p>€ {{ $product["price"] }}</p>
                    <a href="{{ route('marketplace.product', ['id' => $product['id']]) }}">View</a>
                </div>
            </div>
            </li>
        @endforeach
        </ul>

        {{-- {{ $products->links() }} --}}
    </section>
</x-layout>