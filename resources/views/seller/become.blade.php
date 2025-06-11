@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/seller.css') }}">
@endsection

@section('page-content')
    <section class="become-seller">
        <h1>Become a Seller</h1>
        <p>Join our marketplace and start selling your products today!</p>
        <form method="POST" action="{{ route('seller.index') }}">
            @csrf
            <input type="text" name="name" placeholder="Shop Name" required class="form-control" style="margin-bottom:10px;">
            <input type="text" name="email" placeholder="Shop Contact Email" required class="form-control" style="margin-bottom:10px;">
            <input type="text" name="description" placeholder="Shop Description" class="form-control" style="margin-bottom:10px;">
            <button type="submit" class="btn become-seller-btn">Become a Seller</button>
        </form>
    </section>
@endsection