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

    @if(\Illuminate\Support\Facades\Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offest-3 col-sm-offeset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product['qty']}}</span>
                            <strong>{{$product['item']['name']}}</strong>
                            <span class="label label-success">{{$product['price']}}</span>
                            <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                Action
                                <span class="caret"></span>
                                <ul class="dropdown-menu">
{{--                                    <li><a href="{{route('add-to-cart/{}')}}">Reduce</a></li>--}}
                                    <li><a href="#">Reduce</a></li>
                                    <li><a href="#">Increase</a></li>
                                </ul>
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <a type="button" href="{{route('checkout')}}" class="btn btn-success">CheckOut</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No items in shopping-cart</h2>
            </div>
        </div>
    @endif
@endsection
