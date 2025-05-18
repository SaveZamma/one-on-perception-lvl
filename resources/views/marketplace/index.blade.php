{{-- filepath: c:\Users\tommy\Documents\GitHub\one-on-perception-lvl\resources\views\marketplace\index.blade.php --}}
@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <div class="gradient-bg">
        <section class="dashboard">
            <h2>Shop by category</h2>
            <div class="search">
            </div>

            <div class="container">
            </div>

            {{ $products->links() }}
        </section>
        <div class="seller-button-container">
            <a href="{{ route('seller.dashboard') }}" class="btn seller-btn">Go to Seller Dashboard</a>
        </div>
    </div>
@endsection