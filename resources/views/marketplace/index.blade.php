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
            <form method="GET" id="pagination-form" class="pagination-control">
                <label for="perPage">Products per page:</label>
                <select name="perPage" id="perPage" onchange="document.getElementById('pagination-form').submit()">
                    @foreach ([10, 20, 50, 100] as $size)
                        <option value="{{ $size }}" {{ request('perPage', 20) == $size ? 'selected' : '' }}>
                            {{ $size }}
                        </option>
                    @endforeach
                </select>
            </form>
            <input type="text" placeholder="Search for products" />
        </div>

        
        <div class="container">
            <h1 class="title">Product Marketplace</h1>
            <div class="products-container">
                <div class="grid">
                    <?php
                        foreach ($products as $product) {
                            echo "<div class='card'>
                                    <a href='" . route('marketplace.product', ['id' => $product['id']]) . "'>
                                        <img src='{$product['image']}' alt='{$product['name']}'>
                                    </a>
                                    <a href='" . route('marketplace.product', ['id' => $product['id']]) . "'>
                                        <h2>{$product['name']}</h2>
                                    </a>
                                    <p>{$product['price']}</p>
                                    <button class='btn'>Add to cart</button>
                                </div>";
                        }
                    ?>
                </div>
            </div>
        </div>

        {{ $products->links() }}
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