<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up - WhiteCanvas</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="logo" style="justify-content: center; margin-bottom: 24px;">
                <i class="fas fa-paint-brush"></i> WhiteCanvas
            </div>
            <h2>Create an account</h2>
            <p>Start your 30-day free trial.</p>
        </div>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Name*</label>
                <input type="text" name="name" class="form-input" placeholder="Enter your name" required value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label class="form-label">Email*</label>
                <input type="email" name="email" class="form-input" placeholder="Enter your email" required value="{{ old('email') }}">
                @error('email')
                    <p style="color: #D92D20; font-size: 12px; margin-top: 4px;">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Password*</label>
                <input type="password" name="password" class="form-input" placeholder="Create a password" required>
                <p style="font-size: 12px; color: var(--gray-600); margin-top: 6px;">Must be at least 8 characters.</p>
            </div>

            <button type="submit" class="auth-btn">Get started</button>
            
            <div class="social-auth">
                <button type="button" class="btn-social">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" width="18" alt="Google">
                    Sign up with Google
                </button>
            </div>
        </form>

        <div class="auth-footer">
            Already have an account? <a href="{{ route('login') }}">Log in</a>
        </div>
    </div>
</body>
</html>
