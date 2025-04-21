@extends('components.layout')
@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection
{{-- <a href="marketplace/my">My shop</a> --}}
{{-- <section class="promotion">
    <h2>Our best deals</h2>
    <div class="banner" style="background-image: url(https://picsum.photos/800); background-size: cover;">
    </div>
</section> --}}
@section('page-content')
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
                    @foreach ($products->chunk(3) as $productChunk)
                        <div class="row">
                            @foreach($productChunk as $product)
                                <div class='card col-sm-6 col-md-4'>
                                    {{--                            <img src='{$product['image']}' alt='{$product['name']}'>--}}
                                    <h2>{{ $product['name'] }}</h2>
                                    <p>{{ $product['price'] }}</p>
                                    <button class='btn'>Add to cart</button>
                                </div>;
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- {{ $products->links() }} --}}
    </section>
@endsection


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
