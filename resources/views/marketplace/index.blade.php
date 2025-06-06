@extends('components.layout')

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <main class="gradient-bg background-padding">
        <section class="dashboard">
            <h2>Shop by category</h2>
            <div class="search glass">
                <div class="pagination">
                    <form method="GET" id="pagination-form" class="pagination">
                        <label for="perPage">Products per page:</label>
                        <select name="perPage" id="perPage" onchange="document.getElementById('pagination-form').submit()">
                           @foreach ([12, 24, 48, 96] as $size)
                                <option value="{{ $size }}" {{ request('perPage', 20) == $size ? 'selected' : '' }}>
                                    {{ $size }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="search-bar">
                    <form method="GET" id="search-form" class="search-bar">
                        <div class="category-multiselect">
                            <button type="button" onclick="toggleDropdown()" class="dropdown-btn">Select categories</button>
                            <div id="dropdown-content" class="dropdown-content" style="display:none;">
                                @foreach ($categories as $category)
                                    <label>
                                        <input type="checkbox" name="category[]" value="{{ $category->id }}"
                                            {{ (is_array(request('category')) && in_array($category->id, request('category'))) ? 'checked' : '' }}>
                                        {{ $category->name }}
                                    </label><br>
                                @endforeach
                            </div>
                        </div>
                        <script>
                        function toggleDropdown() {
                            var content = document.getElementById('dropdown-content');
                            content.style.display = content.style.display === 'none' ? 'block' : 'none';
                        }
                        document.addEventListener('click', function(e) {
                            if (!e.target.closest('.category-multiselect')) {
                                document.getElementById('dropdown-content').style.display = 'none';
                            }
                        });
                        </script>
                        <input type="text" name="search" placeholder="Search for products"
                               value="{{ request('search', '') }}" />
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="container">
                <h1 class="title">Product Marketplace</h1>
                <div class="products-container">
                    @php
                        $currencySymbols = [
                            'EUR' => '€',
                            'USD' => '$',
                            'AUD' => '$',
                            'CAD' => '$',
                            'NZD' => '$'
                        ];
                    @endphp
                    <div class="grid">
                        @foreach ($products as $product)
                            @php
                               $symbol = $currencySymbols[$product['currency']] ?? $product['currency'];
                            @endphp                            
                            <form action="{{route('shopping-cart.addToCart', ['id' => $product->id])}}" method="GET">
                                <a class="card" href="{{ route('marketplace.product', ['id' => $product['id']]) }}">
                                    <img src="{{ $product['imagePath'] }}" alt="{{ $product['name'] }}">
                                    <h2>{{ $product['name'] }}</h2>
                                    <p>{{ $symbol }} {{ $product['price'] }}</p>
                                    <button type="submit" class="btn">Add to cart</button>
                                </a>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>

            {{ $products->links() }}
        </section>
        <div class="seller-button-container">
            <a href="{{ route('seller.dashboard') }}" class="btn seller-btn">Go to Seller Dashboard</a>
        </div>
    </main>
@endsection
