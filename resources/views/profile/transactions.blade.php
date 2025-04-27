@extends('components.layout')

@section('page-content')
    <ul class="products-list">
        @foreach ($transactions as $transaction)
            <li class="card-border fx-row fx-space-between" style="padding: 0.2rem 1rem;">
                <p><strong>{{ $transaction->getCurrencySymbol() }}</strong></p>
                <p>Date: {{ $transaction['created_at']->format('d/m/Y') }}</p>
            </li>
        @endforeach
    </ul>

@endsection
