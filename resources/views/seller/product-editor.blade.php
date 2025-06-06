{{-- filepath: resources/views/seller/product-editor.blade.php --}}
@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/marketplace.css') }}">
@endsection

@section('page-content')
    <main class="gradient-bg background-padding">
        <section class="dashboard">
            <div class="container">
                <h1 class="title">
                    {{ isset($product) ? 'Edit insertion' : 'Add new insertion' }}
                </h1>
                <form method="POST" action="{{ isset($product) ? route('seller.products.update', $product->id) : route('seller.products.store') }}" enctype="multipart/form-data" class="grid-seller">
                    @csrf
                    @if(isset($product))
                        @method('PUT')
                    @endif
                    
                    @if(isset($product) && $product->imagePath)
                        <img src="{{ asset('storage/' . $product->imagePath) }}" alt="Current image" class="product-img">
                    @endif

                    <table>
                        <tr>
                            <td>
                                <label for="name" class="form-label">Product Name</label>
                            </td>
                            <td>
                                <input type="text" id="name" name="name" placeholder="Product Name" required class="form-control" value="{{ old('name', $product->name ?? '') }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description" class="form-label">Description</label>
                            </td>
                            <td>
                                <textarea id="description" name="description" placeholder="Product Description" class="form-control" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="price" class="form-label">Price</label>
                            </td>
                            <td>
                                <input type="number" id="price" name="price" placeholder="Price" step="0.01" required class="form-control" value="{{ old('price', $product->price ?? '') }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="currency" class="form-label">Currency</label>
                            </td>
                            <td>
                                <input type="text" id="currency" name="currency" placeholder="Currency (e.g. EUR, USD)" required class="form-control" value="{{ old('currency', $product->currency ?? '') }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="image" class="form-label">Product Image</label>
                            </td>
                            <td>
                                <input type="file" id="image" name="image" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn primary">
                        {{ isset($product) ? 'Update insertion' : 'Add insertion' }}
                    </button>
                    <button href="{{ route('seller.dashboard') }}" class="btn primary">Back to Dashboard</button>
                </form>
            </div>
        </section>
    </main>
@endsection