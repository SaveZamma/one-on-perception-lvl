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
                    <li>
                        <a class="card" href="{{ route('seller.products.edit', $product->id) }}">
                            <img src="{{ asset('storage/' . $product['imagePath']) }}" alt="{{ $product['name'] }}">
                            <h2>{{ $product['name'] }}</h2>
                            <p>{{ $symbol }} {{ $product['price'] }}</p>
                            <span title="Quantity available">
                                In stock: {{ $product->quantity }}
                            </span>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" style="margin-top: 0.5rem;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" title="Delete" onclick="return confirm('Are you sure you want to delete this insertion?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="18" height="18" style="vertical-align:middle;">
                                        <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>    
                                    </svg>
                                </button>
                            </form>
                        </a>
                    </li>
                @empty
                    <p style="margin: 30px auto; text-align: center;">You have no products yet.</p>
                @endforelse
            </ul>
        </section>
    </main>
@endsection

@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if(session('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 2000,
                close: true,
                style: {
                    background: "linear-gradient(to right, #29A3A3, #FE7171)",
                },
            }).showToast();
        </script>
    @endif
@endsection