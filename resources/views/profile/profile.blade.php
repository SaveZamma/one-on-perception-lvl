<x-layout>
    @vite('resources/css/profile.css')

    
    <section class="profile-section-card">
        <h2>{{ Auth::user()->username }}</h2>
    
        {{-- <p>{{ Auth::user()->email}}</p> --}}
        <p>Member since: {{ Auth::user()->created_at->format('d M Y') }}</p>

    </section>

    <section class="profile-actions">

        <div class="profile-section-card with-shadow-sm">
            <h2>My Orders</h2>
        </div>
        
        <div class="profile-section-card with-shadow-sm">
            <h2>My Payments</h2>
        </div>
        
        <div class="profile-section-card with-shadow-sm">
            <h2>Profile Details</h2>
        </div>
    </section>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="glass fill-width with-shadow-sm">Logout</button>
    </form>
</x-layout>