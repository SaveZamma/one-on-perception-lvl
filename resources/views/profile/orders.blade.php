@extends('components.layout')

@section('page-content')
    <h2>My Orders</h2>
{{--    @if ($orders->count() == 0)--}}
{{--        <p>You haven't placed any order yet.</p>--}}
{{--    @else--}}
    <ul class="products-list">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <h4>{{\Illuminate\Support\Facades\Session::get('success')}}</h4>
        @endif
        @foreach ($orders as $order)
            <li class="card-border fx-row fx-space-between" style="padding: 0.2rem 1rem;">
                <a href="{{ route('order-recap.index', ['id' => $order->id]) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                    </svg>
                    Vedi
                </a>
                <p>Order title: <strong>{{ $order['title'] }}</strong></p>
                <p>Order status: <strong>{{ $order['status']->label() }}</strong></p>
                <p>Order date: <strong>{{ $order['created_at']->format('d/m/Y') }}</strong></p>
            </li>
        @endforeach
    </ul>
{{--    @endif--}}

@endsection
