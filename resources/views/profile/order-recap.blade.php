@extends('components.layout')

@section('scripts')
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/wishlist.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/cart.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/form.css') }}">
@endsection

@section('page-content')
    <section class="cart">
        <ul class="products-list">
            @foreach($cart->items as $item)
                <li class="card-border fx-col">
                    <p class="product-title">
                        <strong>{{$item['item']['name']}}</strong>
                        <span class="label label-success">{{$item['price']}} $</span>
                    </p>

                    <span>{{$item['qty']}}</span>
                </li>
            @endforeach
        </ul>
        <hr>
        <section class="checkout fx-row fx-space-between">
            <p class="cart-total"><strong>Total: {{$totalPrice}} $</strong></p>
        </section>
    </section>
@endsection
