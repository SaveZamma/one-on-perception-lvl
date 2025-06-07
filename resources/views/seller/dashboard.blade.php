@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <main class="gradient-bg background-padding" style="min-height:100vh;">
        <section class="dashboard">
            <div class="container">
                <h1 class="title" style="margin-bottom: 10px;">Seller Dashboard</h1>
                <p style="margin-bottom: 30px;">Welcome to your seller dashboard. Here, you can list and manage your insertions.</p>

                <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
                    <a href="{{ route('seller.products.create') }}" class="btn primary">Add New Product</a>
                </div>

                <div class="container">
                    <h1 class="title">Your insertions</h1>
                    <div class="products-container">
                        @php
                            $currencySymbols = [
                                'EUR' => '€',
                                'USD' => '$',
                                'AUD' => '$',
                                'CAD' => '$',
                                'NZD' => '$'
                            ];
                        @endphp
                        <div class="grid">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection