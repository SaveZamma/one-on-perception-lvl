@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <section class="seller-dashboard">
        <h1>Seller Dashboard</h1>
        <p>Welcome to your seller dashboard. Here, you can list and manage your products.</p>
        <a href="#" class="btn">Add New Product</a>
    </section>
@endsection