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
                        @foreach ($products as $product)
                            @if ($product->wishlist_id == $wishlist['id'])
                                <li class="card pad-2">
                                    {{-- <img src="{{$product->imagePath}}" alt="{{$product->name}}"> --}}
                                    {{-- <p class="price-tag"><strong>{{ $product->price }}</strong></p> --}}

                                    <a href="{{ route('marketplace.product', ['id' => $product->id]) }}">
                                        {{ $product->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>

                </li>
            @endforeach    
        @endif
    </ul>
@endsection
