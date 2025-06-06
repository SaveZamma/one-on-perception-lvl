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

                <h2 class="subtitle" style="margin-bottom: 20px;">Your insertions</h2>
                <div class="products-container">
                    <div class="grid">
                        @forelse ($products as $product)
                            <div class="card">
                                <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" class="product-img" style="margin-bottom: 10px;">
                                <h2 style="font-size: 1.2rem; margin: 10px 0 5px 0;">{{ $product->name }}</h2>
                                <p style="font-weight: bold; color: var(--dark-primary); margin-bottom: 5px;">
                                    {{ $product->currency }} {{ $product->price }}
                                </p>
                                <a href="{{ route('seller.products.edit', $product->id) }}" class="btn" style="margin-top: auto;">Edit insertion</a>
                            </div>
                        @empty
                            <p style="margin: 30px auto; text-align: center;">You have no products yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection