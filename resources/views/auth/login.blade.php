<x-layout>
    @vite('resources/css/form.css')

    <div class="gradient-bg centered fill-landing fill-height form-outer-container">
        <h1>Welcome!</h1>
        <div class="form-container glass">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-control">
                    <label for="email">Email:</label>
                    <input type="email" required
                      name="email" id="email"
                      value="{{ old('email') }}"
                    >
                </div>
                <div class="form-control">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <p>
                    Don't have an account? <a href="{{ route('show.register') }}">Register</a>
                </p>
                <button type="submit" class="glass btn-ternary fill-width">Login</button>
    
                @if ($errors->any())
                    <ul class="glass error-item">
                        @foreach ($errors->all() as $error)
                            <li class="tm-10">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512"
                                    style="margin-right: 3%;"
                                >
                                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                                </svg>    
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif  
            </form>
        </div>
    </div>

</x-layout>