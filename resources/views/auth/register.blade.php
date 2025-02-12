<x-layout>
    @vite('resources/css/form.css')

    <div class="gradient-bg centered fill-landing fill-height form-outer-container">
        <h1>Welcome!</h1>
        <div class="form-container glass">
            <form action="">
                <div class="form-control">
                    <label for="username">Username:</label>
                    <input type="text" required
                      name="username" id="username" 
                      value="{{ old('name') }}"
                    >
                </div>
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
                <div class="form-control">
                    <label for="confirmPassword">Confirm password:</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" required>
                </div>
            </form>
            <p>
                Already have an account? <a href="{{ route('show.login') }}">Login</a>
            </p>
            <button type="submit" class="glass btn-ternary">Login</button>
        </div>
    </div>

</x-layout>