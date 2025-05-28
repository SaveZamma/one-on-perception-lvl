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
            <h4>Your total: ${{$totalPrice}}</h4>
            <div id="charge-error" class="alert alert-danger {{!\Illuminate\Support\Facades\Session::has('error') ? 'hidden' : ''}}">
                {{\Illuminate\Support\Facades\Session::get('error')}}
            </div>
            <form action="{{route('checkout')}}" method="post" id="checkout-form">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input  type="text" id="name" class="form-control" required name="name">
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
                    <hr>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-month">Expiry Month</label>
                                    <input  type="month" id="card-expiry-month" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label for="card-expiry-year">Expiry Year</label>
                                    <input  type="number" id="card-expiry-year" class="form-control" required>
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
                    <h5>ADDRESS</h5>
                    <div class="row">
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <select id="country" class="form-control" required>
                                <option>ITALY</option>
                                <option>NORWAY</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <input type="text" id="address-city" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">Zip Code:</label>
                            <input type="text" id="address-zip" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="street">Street:</label>
                            <input type="text" id="address-street" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="number">Number:</label>
                            <input type="text" id="address-number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude:</label>
                            <input type="number" id="latitude" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude:</label>
                            <input type="number" id="longitude" class="form-control">
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
                <button type="submit" class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://js.stripe.com/basil/stripe.js"></script>
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::to('src/js/checkout.js')}}"></script>
@endsection
