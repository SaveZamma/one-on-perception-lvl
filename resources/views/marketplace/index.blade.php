@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/marketplace.js')}}"></script>
@endsection

@section('page-content')
    <main class="gradient-bg background-padding dashboard">
        <h2>Shop by category</h2>
        <search class="search glass">
            <section class="pagination">
                <form method="GET" id="pagination-form" class="pagination">
                    <label for="perPage" class="primary-dark">Products per page:</label>
                    <select name="perPage" id="perPage" onchange="document.getElementById('pagination-form').submit()">
                        @foreach ([10, 20, 50, 100] as $size)
                            <option value="{{ $size }}" {{ request('perPage', 10) == $size ? 'selected' : '' }}>
                                {{ $size }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </section>
            <section class="search-bar">
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
                    <input type="text" name="search" placeholder="Search for products"
                            value="{{ request('search', '') }}" />
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" alt="search" class="white">
                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                        </svg>
                    </button>
                </form>
            </section>
        </search>

        <section class="container products-container">
            @php
                $currencySymbols = [
                    'EUR' => '€',
                    'USD' => '$',
                    'AUD' => '$',
                    'CAD' => '$',
                    'NZD' => '$'
                ];
            @endphp
            <ul class="grid">
                @foreach ($products as $product)
                    @php
                        $symbol = $currencySymbols[$product['currency']] ?? $product['currency'];
                    @endphp
                    <li>
                        <a class="card" href="{{ route('marketplace.product', ['id' => $product['id']]) }}">
                            <img
                                src="{{ $product['imagePath'] }}"
                                alt="{{ $product['name'] }}"
                                onerror="this.onerror=null;this.src='data:image/svg+xml;utf8,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;80&quot; height=&quot;80&quot; viewBox=&quot;0 0 24 24&quot; fill=&quot;none&quot; stroke=&quot;#999&quot; stroke-width=&quot;2&quot; stroke-linecap=&quot;round&quot; stroke-linejoin=&quot;round&quot;><rect x=&quot;3&quot; y=&quot;3&quot; width=&quot;18&quot; height=&quot;18&quot; rx=&quot;2&quot; ry=&quot;2&quot;/><circle cx=&quot;8.5&quot; cy=&quot;8.5&quot; r=&quot;1.5&quot;/><polyline points=&quot;16 15 13 12 8 17&quot;/></svg>'"
                            >
                            <h2>{{ $product['name'] }}</h2>
                            <p>{{ $symbol }} {{ $product['price'] }}</p>
                            <button href="{{route('shopping-cart.addToCart', ['id' => $product->id])}}" class="btn">
                                Add to cart
                            </button>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>

        {{ $products->links() }}
    </main>
@endsection
