@extends('components.layout')

@section('page-content')
    <h2>My Orders</h2>
    @if ($orders->count() == 0)
        <p>You haven't placed any order yet.</p>
    @else
    <ul class="products-list">
        @if(\Illuminate\Support\Facades\Session::has('success'))
            <h4>{{\Illuminate\Support\Facades\Session::get('success')}}</h4>
        @endif
        @foreach ($orders as $order)
            <li class="card-border fx-row fx-space-between" style="padding: 0.2rem 1rem;">
                <p>Order title: <strong>{{ $order['title'] }}</strong></p>
                <p>Order status: <strong>{{ $order['status']->label() }}</strong></p>
                <p>Order date: <strong>{{ $order['created_at']->format('d/m/Y') }}</strong></p>
            </li>
        @endforeach
    </ul>
    @endif

@endsection
