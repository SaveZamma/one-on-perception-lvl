<x-layout>
    <h2>Welcome to our marketplace</h2>



    <a href="marketplace/my">My shop</a>
    <section class="promotion">
        <div class="banner" style="background-image: url(https://picsum.photos/800); background-size: cover;">

        </div>
    </section>
    
    <section class="dashboard">
        
        <input type="text" placeholder="Search for products"/>

        <ul class="products-list">
        @foreach ($products as $product)
            <li class="product card"
                style="background-image: url(https://picsum.photos/800); background-size: cover;"
                {{-- style="background-image: url({{ $product["image"] }})" --}}
            >
            <div class="card-title-container fx-col">
                <h3>{{ $product["name"] }}</h3>
                <div class="fx-row fx-space-between">
                    <p>€ {{ $product["price"] }}</p>
                    <a href="{{ route('marketplace.product', ['id' => $product['id']]) }}">View</a>
                </div>
            </div>
            </li>
        @endforeach
        </ul>

        {{-- {{ $products->links() }} --}}
    </section>
</x-layout>