@extends('components.layout')
@section('page-content')
    <main class="gradient-bg centered fill-landing" alt="gradient background">
        <h1>One On Perception</h1>
        <p>Find everything you need for your adventures.
        Be it dice, miniatures, maps or even an owlbear's egg, we have it all.</p>
        <p>Explore our catalog today and start building your next adventure.</p>
        <a href="{{ route('marketplace.index')}}"
           class="gradient-bg-btn"
        >Enter the marketplace</a>
    </main>
@endsection
