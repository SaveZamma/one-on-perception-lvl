@extends('components.layout')

@section('page-content')
    <h1>My Wishlist</h1>

    <ul class="wishlist-list">
        @if ($wishlists->count() == 0)
            <p>You don't have any wishlists.</p>
        @else
            @foreach ($wishlists as $wishlist)
                <li class="card pad-2">
                    <h2>{{ $wishlist['name'] }}</h2>
                    <p>{{ $wishlist['description'] }}</p>

                    <ul class="product-list">
                        @if ($products->count() == 0)
                            <p>You don't have any products in this wishlist.</p>
                        @else
                            @foreach ($products as $product)
                                @if ($product->wishlist_id == $wishlist['id'])
                                    <li class="card pad-2">
                                        <a href="{{ route('marketplace.product', ['id' => $product->id]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                </li>
            @endforeach
        @endif
    </ul>
@endsection
