@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <section class="product-editor">
        <h1>{{ isset($product) ? 'Edit insertion' : 'Add new insertion' }}</h1>
        <form method="POST" action="{{ isset($product) ? route('seller.products.update', $product->id) : route('seller.products.store') }}" enctype="multipart/form-data">
            @csrf
            @if(isset($product))
                @method('PUT')
            @endif
            <input type="text" name="name" placeholder="Product Name" required class="form-control" style="margin-bottom:10px;" value="{{ old('name', $product->name ?? '') }}">
            <textarea name="description" placeholder="Product Description" class="form-control" style="margin-bottom:10px;">{{ old('description', $product->description ?? '') }}</textarea>
            <input type="number" name="price" placeholder="Price" step="0.01" required class="form-control" style="margin-bottom:10px;" value="{{ old('price', $product->price ?? '') }}">
            <input type="text" name="currency" placeholder="Currency (e.g. EUR, USD)" required class="form-control" style="margin-bottom:10px;" value="{{ old('currency', $product->currency ?? '') }}">
            <input type="file" name="image" class="form-control" style="margin-bottom:10px;">
            @if(isset($product) && $product->imagePath)
                <img src="{{ asset('storage/' . $product->imagePath) }}" alt="Current image" style="max-width:100px;margin-bottom:10px;">
            @endif
            <button type="submit" class="btn">{{ isset($product) ? 'Update insertion' : 'Add insertion' }}</button>
        </form>
        <a href="{{ route('seller.dashboard') }}" class="btn" style="margin-top:1rem;">Back to Dashboard</a>
    </section>
@endsection