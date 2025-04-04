<x-layout>
    @vite('resources/css/marketplace.css')

    {{-- <a href="marketplace/my">My shop</a> --}}
    {{-- <section class="promotion">
        <h2>Our best deals</h2>
        <div class="banner" style="background-image: url(https://picsum.photos/800); background-size: cover;">
        </div>
    </section> --}}

    <section class="dashboard">
        <h2>Shop by category</h2>
        <div class="search">
            <select id="product-category" name="category">
                <option value="all">All</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="food">Food</option>
            </select>
            <input type="text" placeholder="Search for products" />
        </div>

        
        <div class="container">
            <h1 class="title">Product Marketplace</h1>
            <div class="products-container">
                <div class="grid">
                    <?php
        $products = [
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 1', 'price' => '$20', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 2', 'price' => '$35', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 3', 'price' => '$50', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 4', 'price' => '$25', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 5', 'price' => '$40', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 6', 'price' => '$15', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 7', 'price' => '$60', 'image' => 'https://picsum.photos/800'],
            ['name' => 'Product 8', 'price' => '$30', 'image' => 'https://picsum.photos/800'],
        ];
                foreach ($products as $product) {
                    echo "<div class='card'>
                            <img src='{$product['image']}' alt='{$product['name']}'>
                            <h2>{$product['name']}</h2>
                            <p>{$product['price']}</p>
                            <button class='btn'>Add to cart</button>
                        </div>";
                }
                    ?>
                </div>
            </div>
        </div>

        {{-- {{ $products->links() }} --}}
    </section>
</x-layout>

    
{{-- <ul class="products-list">
    @foreach ($products as $product)
        <li class="product card" style="background-image: url(https://picsum.photos/800); background-size: cover;"
            
            <div class="card-title-container fx-col">
                <h3>{{ $product["name"] }}</h3>
                <div class="fx-row fx-space-between">
                    <p>€ {{ $product["price"] }}</p>
                    <a href="{{ route('marketplace.product', ['id' => $product['id']]) }}">View</a>
                </div>
            </div>
        </li>
    @endforeach
</ul> --}}