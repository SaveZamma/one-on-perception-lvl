<x-layout>

    <ul class="products-list">
        @foreach ($orders as $order)
            <li class="card-border">
                <p>Order title: <strong>{{ $order['title'] }}</strong></p>
                <p>Order status: <strong>{{ $order['status']->label() }}</strong></p>
                <p>Order date: <strong>{{ $order['created_at']->format('d/m/Y') }}</strong></p>
            </li>
        @endforeach
    </ul>

</x-layout>