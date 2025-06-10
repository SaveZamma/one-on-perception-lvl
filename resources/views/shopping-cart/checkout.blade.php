@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/checkout.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/form.css') }}">
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/google-map.css') }}">
@endsection

@section('page-content')
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <h1>{{\Illuminate\Support\Facades\Session::get('error')}}</h1>
    @endif

    <h1>Checkout</h1>

    @if(\Illuminate\Support\Facades\Session::has('checkout-error'))
        <p>{{\Illuminate\Support\Facades\Session::get('checkout-error')}}</p>
    @endif

    <form class="checkout-form" action="{{route('checkout')}}" method="post">

        <label for="title">Title</label>
        <input  type="text" id="title" class="form-control" name="title">

        <fieldset class="data-payment-fieldset">
            <legend>Payment Data</legend>
            <label for="card-name">Card holder name</label>
            <input  type="text" id="card-name" class="form-control" required>
            <label for="card-number">Card Number</label>
            <input  type="text" id="card-number" class="form-control" required>
            <label for="card-expiry-month">Expiry</label>
            <input  type="month" id="card-expiry-month" class="form-control" required>
            <label for="card-cvc">CVC</label>
            <input  type="text" id="card-cvc" class="form-control" required>
        </fieldset>

        <fieldset>
            <legend>Shipping Address</legend>

            <label for="country">Country:</label>
            <select id="country" class="form-control" required name="country">
                <option>ITALY</option>
                <option>NORWAY</option>
            </select>

            <div class="form-control">
                <label for="city">City:</label>
                <input type="text" id="address-city" required name="city">
            </div>

            <div class="form-control">
                <label for="zip">Zip Code:</label>
                <input type="text" id="address-zip" required name="zip">
            </div>

            <div class="form-control">
                <label for="street">Street:</label>
                <input type="text" id="address-street" required name="street">
            </div>

            <div class="form-control">
                <label for="number">Number:</label>
                <input type="text" id="address-number" required name="number">
            </div>

            <div class="form-control">
                <label for="latitude">Latitude:</label>
                <input type="number" id="latitude" name="lat">
            </div>

            <div class="form-control">
                <label for="longitude">Longitude:</label>
                <input type="number" id="longitude" name="lng">
            </div>

            <div class="google-map">
                <div id="map"></div>
            </div>


        </fieldset>

        @csrf

        <h4>Your total: ${{$totalPrice}}</h4>

        <button type="submit" class="btn btn-success">Buy Now</button>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/checkout.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=maps,marker"
        defer
    ></script>

@endsection
