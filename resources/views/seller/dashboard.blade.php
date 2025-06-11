@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <main class="gradient-bg background-padding" style="min-height:100vh;">
        <header class="dashboard container">
            <h1 class="title" style="margin-bottom: 10px;">Seller Dashboard</h1>
            <p style="margin-bottom: 30px;">Welcome to your seller dashboard. Here, you can list and manage your insertions.</p>
        </header>
        <section class="fx-col">
            <h2 class="title">Your insertions</h2>
            <a href="{{ route('seller.products.create') }}" class="btn-primary glass with-shadow-sm">Add New Product</a>
            @php
                $currencySymbols = [
                    'EUR' => '€',
                    'USD' => '$',
                    'AUD' => '$',
                    'CAD' => '$',
                    'NZD' => '$'
                ];
            @endphp
            <ul class="products-container grid">

                @forelse ($products as $product)
                @php
                $symbol = $currencySymbols[$product['currency']] ?? $product['currency'];
                @endphp                            
                <form>
                    <a class="card" href="{{ route('seller.products.edit', $product->id) }}">
                        <img src="{{ asset('storage/' . $product['imagePath']) }}" alt="{{ $product['name'] }}">
                        <h2>{{ $product['name'] }}</h2>
                        <p>{{ $symbol }} {{ $product['price'] }}</p>
                    </a>
                </form>
                @empty
                <p style="margin: 30px auto; text-align: center;">You have no products yet.</p>
                @endforelse
            </ul>
        </section>
    </main>
@endsection