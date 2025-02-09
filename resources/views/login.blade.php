<x-layout>
    @vite('resources/css/form.css')

    <div class="gradient-bg centered fill-landing fill-height form-outer-container">
        <h1>Welcome!</h1>
        <div class="form-container glass">
            <form action="">
                <div class="form-control">
                    <label for="username">Username or email:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-control">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
            </form>
            <button type="submit" class="glass btn-ternary">Login</button>
        </div>
    </div>

</x-layout>