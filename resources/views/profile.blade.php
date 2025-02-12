<x-layout>
    <h1>profile page is working!</h1>
    <p>Profile page is working fine</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</x-layout>