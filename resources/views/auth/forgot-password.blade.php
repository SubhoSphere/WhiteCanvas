<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - WhiteCanvas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-header">
            <div class="value-icon" style="margin-bottom: 24px;"><i class="fas fa-key"></i></div>
            <h2>Forgot password?</h2>
            <p>No worries, we’ll send you reset instructions.</p>
        </div>

        <form action="#" method="POST">
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" placeholder="Enter your email" required>
            </div>

            <button type="submit" class="auth-btn">Reset password</button>
        </form>

        <div class="auth-footer">
            <a href="{{ route('login') }}" style="color: var(--gray-600);"><i class="fas fa-arrow-left"></i> Back to log in</a>
        </div>
    </div>
</body>
</html>
