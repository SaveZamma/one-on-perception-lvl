@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
@endsection

@section('page-content')
    <div class="product-page container">
        <div class="product-card card">
            <img src="{{ $product->imagePath }}" alt="{{ $product->name }}" class="product-img">
            <h1 class="product-title">{{ $product->name }}</h1>
            <p class="product-description">{{ $product->description }}</p>
            <p class="product-price">€ {{ $product->price }}</p>
            <button class="btn btn-primary">Add to Wishlist</button>
        </div>
    </div>
@endsection
