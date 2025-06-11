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
            @foreach($cart->items as $key => $node)
                <li class="card-border fx-col">
                    <a href="{{ route('marketplace.product', ['id' =>  $key]) }}" title="Product Page">
                        <p class="product-title">
                            <strong>{{$node['item']['name']}}</strong>
                            <span class="label label-success">{{$node['price']}} $</span>
                        </p>

                        <span>{{$node['qty']}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <section class="checkout fx-row fx-space-between">
            <p class="cart-total"><strong>Total: {{$totalPrice}} $</strong></p>
        </section>
    </section>
@endsection
