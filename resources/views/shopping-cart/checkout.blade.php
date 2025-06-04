@extends('components.layout')
@vite('resources/js/wishlist.js')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
@endsection

@section('page-content')
    @if(\Illuminate\Support\Facades\Session::has('error'))
        <h1>{{\Illuminate\Support\Facades\Session::get('error')}}</h1>
    @endif

    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <h1>Checkout</h1>

            @if(\Illuminate\Support\Facades\Session::has('checkout-error'))
                <p>{{\Illuminate\Support\Facades\Session::get('checkout-error')}}</p>
            @endif

            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input  type="text" id="title" class="form-control" name="title">
                        </div>
                    </div>

                    <hr>

                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-name">Card holder name</label>
                            <input  type="text" id="card-name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-number">Card Number</label>
                            <input  type="text" id="card-number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-month">Expiry</label>
                                    <input  type="month" id="card-expiry-month" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="card-cvc">CVC</label>
                            <input  type="text" id="card-cvc" class="form-control" required>
                        </div>
                    </div>

                    <hr>

                    <h4>Shipping Address</h4>
                    <div class="row">
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <select id="country" class="form-control" required name="country">
                                <option>ITALY</option>
                                <option>NORWAY</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" id="address-city" class="form-control" required name="city">
                        </div>
                        <div class="form-group">
                            <label for="zip">Zip Code:</label>
                            <input type="text" id="address-zip" class="form-control" required name="zip">
                        </div>
                        <div class="form-group">
                            <label for="street">Street:</label>
                            <input type="text" id="address-street" class="form-control" required name="street">
                        </div>
                        <div class="form-group">
                            <label for="number">Number:</label>
                            <input type="text" id="address-number" class="form-control" required name="number">
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input type="number" id="latitude" class="form-control" name="lat">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <input type="number" id="longitude" class="form-control" name="lng">
                        </div>
                    </div>
                </div>

                @csrf

                <h4>Your total: ${{$totalPrice}}</h4>
                <div id="charge-error" class="alert alert-danger {{!\Illuminate\Support\Facades\Session::has('error') ? 'hidden' : ''}}">
                    {{\Illuminate\Support\Facades\Session::get('error')}}
                </div>

                <button type="submit" class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/checkout.js')}}"></script>
@endsection
