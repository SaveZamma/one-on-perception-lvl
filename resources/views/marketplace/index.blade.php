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
                        <label for="perPage" class="primary-dark">Products per page:</label>
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
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="search" class="white">
                                <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                            </svg>
                        </button>
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
    </main>
@endsection
