<div class="login-container">
        <h2>Login</h2>
        <form action="/login" method="POST">
        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}" required>
                @error('email') <p class="error">{{ $message }}</p> @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                @error('password') <p class="error">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="login-btn">Login</button>
            <a href="/register">Register</a>

        </form>
    </div>