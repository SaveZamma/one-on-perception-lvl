{{-- filepath: c:\Users\tommy\Documents\GitHub\one-on-perception-lvl\resources\views\seller\index.blade.php --}}
@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/seller.css') }}">
@endsection

@section('page-content')
    <section class="become-seller">
        <h1>Become a Seller</h1>
        <p>Join our marketplace and start selling your products today!</p>
        <a href="#" class="btn become-seller-btn">Become a Seller</a>
    </section>
@endsection