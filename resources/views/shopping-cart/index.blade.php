@extends('components.layout')

@section('scripts')
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/wishlist.js')}}"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/cart.css') }}">
@endsection

@section('page-content')
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <script>
            Toastify({
                text: '{{\Illuminate\Support\Facades\Session::get('error')}}',
                duration: 2000,
                close: true,
                style: {
                    background: "linear-gradient(to right, #29A3A3, #FE7171)",
                },
            }).showToast();
        </script>
    @endif
    <section class="cart">
    @if(\Illuminate\Support\Facades\Cookie::has('shopping_cart'))
        <ul class="products-list">
            @foreach($products as $product)
                <li class="card-border fx-col">
                    <p class="product-title">
                        <strong>{{$product['item']['name']}}</strong>
                        <span class="label label-success">{{$product['price']}} $</span>
                    </p>
                    <span class="product-actions fx-row">
                        <span class="qty-edit">
                            <a href="{{route('shopping-cart.reduceByOne', ['id' => $product['item']['id']])}}" title="Reduce">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="minus">
                                    <path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/>
                                </svg>
                            </a>
                            <span>{{$product['qty']}}</span>
                            <a href="{{route('shopping-cart.increaseByOne', ['id' => $product['item']['id']])}}" title="Increase">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="plus">
                                    <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/>
                                </svg>
                            </a>
                        </span>

                        <a href="{{route('shopping-cart.removeItem', ['id' => $product['item']['id']])}}" title="Remove form cart">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="delete" class="secondary">
                                <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                            </svg>
                        </a>
                    </span>
                </li>
            @endforeach
        </ul>
        <hr>
        <section class="checkout fx-row fx-space-between">
            <p class="cart-total"><strong>Total: {{$totalPrice}} $</strong></p>
            <a type="button" href="{{route('checkout')}}" class="btn btn-checkout">
                Checkout
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" alt="right arrow">
                    <path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/>
                </svg>
            </a>
        </section>
    @else
        <h2>No items in shopping-cart</h2>
    @endif
    </section>
@endsection
