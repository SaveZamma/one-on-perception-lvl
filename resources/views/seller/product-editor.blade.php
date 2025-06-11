@extends('components.layout')

@section('styles')
    <link rel="stylesheet" href="{{ \Illuminate\Support\Facades\URL::to('src/css/product.css') }}">
@endsection

@section('page-content')
    <main class="gradient-bg background-padding">
        <section class="dashboard container card">
            <h1 class="title">
                {{ isset($product) ? 'Edit insertion' : 'Add new insertion' }}
            </h1>
            <form method="POST" class="grid-seller"
                action="{{ isset($product) ? route('seller.products.update', $product->id) : route('seller.products.store') }}"
                enctype="multipart/form-data"
            >
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                <img id="image-preview" alt="Current image" class="product-img"
                    src="{{ isset($product) && $product->imagePath ? asset('storage/' . $product->imagePath) : '' }}"
                />
                <table>
                    <tr>
                        <td>
                            <label for="name" class="form-a">Product Name</label>
                        </td>
                        <td>
                            <input type="text" id="name" name="name" placeholder="Product Name" required class="form-control" value="{{ old('name', $product->name ?? '') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="description" class="form-a">Description</label>
                        </td>
                        <td>
                            <textarea id="description" name="description" placeholder="Product Description" class="form-control" rows="3">{{ old('description', $product->description ?? '') }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="price" class="form-a">Price</label>
                        </td>
                        <td>
                            <input type="number" id="price" name="price" placeholder="Price" step="0.01" required class="form-control" value="{{ old('price', $product->price ?? '') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="currency" class="form-a">Currency</label>
                        </td>
                        <td>
                            <input type="text" id="currency" name="currency" placeholder="Currency (e.g. EUR, USD)" required class="form-control" maxlength="3" value="{{ old('currency', $product->currency ?? '') }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="image" class="form-a">Product Image</label>
                        </td>
                        <td>
                            <label for="image" class="btn glass with-shadow-sm" style="display:inline-block; cursor:pointer; margin-bottom:0;">
                                Choose Image
                                <input type="file" id="image" name="image" class="form-control" style="display:none;" onchange="previewImage(event)">
                            </label>
                        </td>
                    </tr>
                </table>
                <div class="category-box dropdown-content">
                    @foreach ($categories as $category)
                        <label class="category-tag" for="cat-{{ $category->id }}">
                            <input type="checkbox" id="cat-{{ $category->id }}" name="category[]" value="{{ $category->id }}"
                                {{ (isset($selectedCategories) && in_array($category->id, $selectedCategories)) ? 'checked' : '' }}>
                            {{ $category->name }}
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="btn glass with-shadow-sm">
                    {{ isset($product) ? 'Update insertion' : 'Add insertion' }}
                </button>
                <a href="{{ route('seller.dashboard') }}" class="btn glass with-shadow-sm">Back to Dashboard</a>
            </form>
        </section>
    </main>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection