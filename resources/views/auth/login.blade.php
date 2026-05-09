<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - WhiteCanvas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="logo" style="justify-content: center; margin-bottom: 24px;">
                <i class="fas fa-paint-brush"></i> WhiteCanvas
            </div>
            <h2>Welcome back</h2>
            <p>Please enter your details.</p>
        </div>

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" placeholder="Enter your email" required value="{{ old('email') }}">
                @error('email')
                    <p style="color: #D92D20; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" style="font-size: 14px; font-weight: 500;">Remember for 30 days</label>
                </div>
                <a href="{{ route('password.request') }}" style="font-size: 14px; font-weight: 600; color: #6941C6;">Forgot password</a>
            </div>

            <button type="submit" class="auth-btn">Sign in</button>
            
            <div class="social-auth">
                <button type="button" class="btn-social">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="18" alt="Google">
                    Sign in with Google
                </button>
            </div>
        </form>

        <div class="auth-footer">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</body>
</html>
