@extends('components.layout')
@vite('resources/js/wishlist.js')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
@endsection

@section('page-content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="row">
            <div class="col-sm-6 col md-4 col-md-offset-4 col-sm-offset-4">
                <div id="charge-message" class="alert alert-success">
                    {{\Illuminate\Support\Facades\Session::get('success')}}
                </div>
            </div>
        </div>
    @endif

    @if(\Illuminate\Support\Facades\Cookie::has('shopping_cart'))
        <ul class="products-list">
            @foreach($products as $product)
                <li class="card-border fx-row fx-space-between">
                    <span class="badge">{{$product['qty']}}</span>
                    <strong>{{$product['item']['name']}}</strong>

                    <span class="label label-success">{{$product['price']}}</span>

                    <a href="{{route('shopping-cart.reduceByOne', ['id' => $product['item']['id']])}}">Reduce</a>
                    <a href="{{route('shopping-cart.removeItem', ['id' => $product['item']['id']])}}">Remove from Cart</a>
                </li>
            @endforeach
        </ul>
        <strong>Total: {{$totalPrice}}</strong>
        <hr>
        <a type="button" href="{{route('checkout')}}" class="btn btn-success">CheckOut</a>
        <strong>Total: {{$totalPrice}}</strong>
    @else
        <h2>No items in shopping-cart</h2>
    @endif
@endsection
