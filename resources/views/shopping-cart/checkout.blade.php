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

    <main>
        <form class="checkout-form" action="{{route('checkout')}}" method="post">
            <p>
                <label for="title">Title</label>
                <input  type="text" id="title" class="form-control" name="title">
            </p>

            <fieldset>
                <legend>Shipping Address</legend>

                <label for="country">Country:</label>
                <select id="country" class="form-control" required name="country">
                    <option>ITALY</option>
                    <option>NORWAY</option>
                </select>

                <label for="city">City:</label>
                <input class="form-control" type="text" id="address-city" required name="city">

                <label for="zip">Zip Code:</label>
                <input class="form-control" type="text" id="address-zip" required name="zip">

                <label for="street">Street:</label>
                <input class="form-control" type="text" id="address-street" required name="street">

                <label for="number">Number:</label>
                <input class="form-control" type="text" id="address-number" required name="number">

                <label for="latitude">Latitude:</label>
                <input class="form-control" type="number" id="latitude" name="lat">

                <label for="longitude">Longitude:</label>
                <input class="form-control" type="number" id="longitude" name="lng">
            </fieldset>

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

            <section class="google-map">
                <div id="map"></div>
            </section>

            <section class="fx-col total">
                @csrf
                <h4>Your total: ${{$totalPrice}} $</h4>
                <button type="submit" class="btn btn-primary glass with-shadow-sm btn-success">
                    Buy Now
                </button>
            </section>
        </form>
    </main>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/checkout.js')}}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?libraries=maps,marker"
        defer
    ></script>
@endsection
