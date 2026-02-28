<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – JMPSS School</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --primary: #1a3c6e; --primary-light: #2a5ba0;
            --accent: #f59e0b; --accent-dark: #d97706;
        }
        body {
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: stretch;
            background: #0f2447;
        }

        /* Left Panel */
        .login-left {
            flex: 1;
            background: linear-gradient(135deg, #1a3c6e 0%, #2a5ba0 50%, #1e4d87 100%);
            display: flex; flex-direction: column; justify-content: center; align-items: center;
            padding: 60px;
            position: relative; overflow: hidden;
        }
        .login-left::before {
            content: ''; position: absolute;
            top: -20%; right: -20%;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(245,158,11,0.2) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 6s ease-in-out infinite;
        }
        .login-left::after {
            content: ''; position: absolute;
            bottom: -20%; left: -15%;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
            border-radius: 50%;
        }
        @keyframes pulse { 0%,100%{transform:scale(1);}50%{transform:scale(1.1);} }
        .brand { text-align: center; z-index: 1; position: relative; }
        .brand-icon { width: 90px; height: 90px; background: var(--accent); border-radius: 24px; display: grid; place-items: center; font-size: 42px; font-weight: 800; color: var(--primary); margin: 0 auto 24px; box-shadow: 0 16px 40px rgba(245,158,11,0.4); }
        .brand h1 { font-size: 2.5rem; font-weight: 800; color: white; margin-bottom: 8px; }
        .brand p { color: rgba(255,255,255,0.7); font-size: 16px; margin-bottom: 48px; }
        .features { list-style: none; text-align: left; }
        .features li { display: flex; align-items: center; gap: 12px; color: rgba(255,255,255,0.85); font-size: 15px; margin-bottom: 16px; }
        .features li i { width: 32px; height: 32px; background: rgba(245,158,11,0.2); color: var(--accent); border-radius: 8px; display: grid; place-items: center; font-size: 14px; flex-shrink: 0; }

        /* Right Panel */
        .login-right {
            width: 480px;
            background: #f8fafc;
            display: flex; flex-direction: column; justify-content: center;
            padding: 60px 48px;
        }
        .login-header { margin-bottom: 36px; }
        .login-header h2 { font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 8px; }
        .login-header p { color: #64748b; font-size: 15px; }

        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .form-control {
            width: 100%; padding: 14px 16px; border: 2px solid #e5e7eb;
            border-radius: 12px; font-size: 15px; font-family: 'Outfit', sans-serif;
            transition: all 0.2s ease; background: white;
            outline: none;
        }
        .form-control:focus { border-color: var(--primary); box-shadow: 0 0 0 4px rgba(26,60,110,0.1); }
        .form-control.error-field { border-color: #ef4444; }
        .input-wrapper { position: relative; }
        .input-icon { position: absolute; left: 16px; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 16px; }
        .input-wrapper .form-control { padding-left: 44px; }
        .toggle-pass { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: #9ca3af; font-size: 16px; }
        .toggle-pass:hover { color: var(--primary); }

        .form-check { display: flex; align-items: center; gap: 10px; margin-bottom: 28px; }
        .form-check input[type="checkbox"] { width: 18px; height: 18px; accent-color: var(--primary); cursor: pointer; }
        .form-check label { font-size: 14px; color: #6b7280; cursor: pointer; }

        .btn-login {
            width: 100%; padding: 15px; background: linear-gradient(135deg, var(--primary), var(--primary-light));
            color: white; font-size: 16px; font-weight: 700; border: none;
            border-radius: 12px; cursor: pointer; transition: all 0.3s ease;
            font-family: 'Outfit', sans-serif; letter-spacing: 0.3px;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 30px rgba(26,60,110,0.35); }
        .btn-login:active { transform: translateY(0); }

        .error-msg { color: #ef4444; font-size: 13px; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
        .alert { padding: 14px 16px; border-radius: 10px; margin-bottom: 24px; font-size: 14px; display: flex; align-items: center; gap: 10px; }
        .alert-error { background: #fee2e2; color: #991b1b; border: 1px solid #fca5a5; }
        .alert-success { background: #d1fae5; color: #065f46; border: 1px solid #6ee7b7; }

        .login-footer { text-align: center; margin-top: 32px; font-size: 13px; color: #9ca3af; }
        .login-footer a { color: var(--primary); font-weight: 600; text-decoration: none; }
        .back-btn { display: inline-flex; align-items: center; gap: 8px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 14px; margin-bottom: 40px; transition: color 0.2s; position: relative; z-index: 1; }
        .back-btn:hover { color: var(--accent); }

        @media (max-width: 900px) {
            body { flex-direction: column; }
            .login-left { padding: 48px 24px; min-height: 280px; }
            .login-left .features { display: none; }
            .login-right { width: 100%; padding: 40px 24px; }
        }
    </style>
</head>
<body>

<!-- Left Branding Panel -->
<div class="login-left">
    <a href="{{ route('home') }}" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Website</a>
    <div class="brand">
        <div class="brand-icon">J</div>
        <h1>JMPSS</h1>
        <p>School Management Admin Panel</p>
        <ul class="features">
            <li><i class="fas fa-home"></i> Manage Home Page Content</li>
            <li><i class="fas fa-images"></i> Upload Photos & Videos</li>
            <li><i class="fas fa-calendar-alt"></i> Create & Manage Events</li>
            <li><i class="fas fa-trophy"></i> Update Awards & Achievements</li>
            <li><i class="fas fa-comments"></i> Manage Testimonials</li>
        </ul>
    </div>
</div>

<!-- Right Login Form -->
<div class="login-right">
    <div class="login-header">
        <h2>Welcome Back 👋</h2>
        <p>Sign in to access the JMPSS admin panel</p>
    </div>

    @if(session('success'))
    <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login.post') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <div class="input-wrapper">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="form-control @error('email') error-field @enderror"
                    placeholder="admin@jmpss.edu" value="{{ old('email') }}" autocomplete="email" required>
            </div>
            @error('email')
            <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-wrapper">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" id="password" name="password" class="form-control @error('password') error-field @enderror"
                    placeholder="Enter your password" autocomplete="current-password" required>
                <button type="button" class="toggle-pass" onclick="togglePassword()" id="toggle-btn">
                    <i class="fas fa-eye" id="toggle-icon"></i>
                </button>
            </div>
            @error('password')
            <div class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Keep me signed in</label>
        </div>

        <button type="submit" class="btn-login">
            <i class="fas fa-sign-in-alt"></i> &nbsp;Sign In to Admin Panel
        </button>
    </form>

    <div class="login-footer">
        <p>🔐 Secure Admin Login — Authorized Personnel Only</p>
        <p style="margin-top:8px;"><a href="{{ route('home') }}">← Return to School Website</a></p>
    </div>
</div>

<script>
function togglePassword() {
    const pwd = document.getElementById('password');
    const icon = document.getElementById('toggle-icon');
    if (pwd.type === 'password') {
        pwd.type = 'text';
        icon.className = 'fas fa-eye-slash';
    } else {
        pwd.type = 'password';
        icon.className = 'fas fa-eye';
    }
}
</script>
</body>
</html>
