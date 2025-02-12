<x-layout>
    <h1>Hi {{ Auth::user()->username }}</h1>
    <p>Profile page is working fine</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="glass fill-width">Logout</button>
    </form>
</x-layout>