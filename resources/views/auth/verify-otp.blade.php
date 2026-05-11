<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - WhiteCanvas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="value-icon" style="margin-bottom: 24px;"><i class="fas fa-envelope-open-text"></i></div>
            <h2>Verify your email</h2>
            <p>We've sent a 6-digit code to your email. Please enter it below to continue.</p>
        </div>

        @if(session('success'))
            <div style="background: #ECFDF3; color: #027A48; padding: 12px; border-radius: var(--radius-md); margin-bottom: 24px; font-size: 14px; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('otp.verify') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ request('email') }}">
            
            <div class="form-group" style="text-align: center;">
                <label class="form-label" style="text-align: left;">Verification Code</label>
                <input type="text" name="otp" class="form-input" placeholder="000000" style="text-align: center; font-size: 32px; letter-spacing: 8px; font-weight: 700; height: 64px;" maxlength="6" required autofocus>
                @error('otp')
                    <p style="color: #D92D20; font-size: 12px; margin-top: 8px; text-align: left;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="auth-btn">Verify email</button>
        </form>

        <div class="auth-footer">
            Didn't receive the code? 
            <form action="{{ route('otp.resend') }}" method="POST" style="display: inline;">
                @csrf
                <input type="hidden" name="email" value="{{ request('email') }}">
                <button type="submit" style="background: none; border: none; color: #6941C6; font-weight: 600; cursor: pointer;">Click to resend</button>
            </form>
        </div>

        <div class="auth-footer" style="margin-top: 16px;">
            <a href="{{ route('login') }}" style="color: var(--gray-600);"><i class="fas fa-arrow-left"></i> Back to log in</a>
        </div>
    </div>
</body>
</html>
