@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <div class="gradient-bg background-padding">
        <section class="dashboard">
            <h2>Shop by category</h2>
            <div class="search glass">
                <div class="pagination">
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
                </div>
                <div class="search-bar">
                    <form method="GET" id="search-form" class="search-bar">
                        <select id="product-category" name="category" onchange="document.getElementById('search-form').submit()">
                            <option value="all" {{ request('category', 'all') == 'all' ? 'selected' : '' }}>All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <input type="text" name="search" placeholder="Search for products"
                            value="{{ request('search', '') }}" />
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="container">
                <h1 class="title">Product Marketplace</h1>
                <div class="products-container">
                    <div class="grid">
                        @foreach ($products as $product)
                            <a class="card" href="{{ route('marketplace.product', ['id' => $product['id']]) }}">
                                <img src="{{ $product['imagePath'] }}" alt="{{ $product['name'] }}">
                                <h2>{{ $product['name'] }}</h2>
                                <p>€ {{ $product['price'] }}</p>
                                <button class="btn">Add to cart</button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            {{ $products->links() }}
        </section>
        <div class="seller-button-container">
            <a href="{{ route('seller.dashboard') }}" class="btn seller-btn">Go to Seller Dashboard</a>
        </div>
    </div>
@endsection