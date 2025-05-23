@extends('components.layout')
@vite('resources/js/wishlist.js')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
@endsection

@section('page-content')
<p>cart is working</p>
@endsection
