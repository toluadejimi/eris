<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In | ERIS Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --eris-primary: #0f766e;
            --eris-primary-hover: #0d5d56;
            --eris-accent: #14b8a6;
            --eris-bg: #f0fdfa;
            --eris-card: #ffffff;
            --eris-text: #134e4a;
            --eris-muted: #5eead4;
            --eris-error: #dc2626;
            --eris-success: #059669;
        }
        * { box-sizing: border-box; }
        body {
            font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: stretch;
        }
        .login-wrap {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
            width: 100%;
        }
        .login-brand {
            flex: 1 1 50%;
            min-height: 360px;
            background: linear-gradient(135deg, #0f766e 0%, #0d9488 50%, #14b8a6 100%);
            background-image: url('{{ asset("images/bg-1.jpg") }}');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            background-color: rgba(15, 118, 110, 0.85);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2.5rem;
            text-align: center;
        }
        .login-brand-content {
            max-width: 320px;
        }
        .login-brand .logo {
            max-width: 180px;
            max-height: 120px;
            object-fit: contain;
            margin-bottom: 1.5rem;
        }
        .login-brand .brand-text {
            color: white;
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }
        .login-brand .brand-tagline {
            color: rgba(255,255,255,0.9);
            font-size: 0.95rem;
        }
        .login-form-panel {
            flex: 1 1 50%;
            min-height: 360px;
            background: var(--eris-card);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-form-inner {
            width: 100%;
            max-width: 380px;
        }
        .login-form-inner h1 {
            font-size: 1.375rem;
            font-weight: 700;
            color: var(--eris-text);
            margin-bottom: 0.25rem;
        }
        .login-form-inner .subtitle {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }
        @media (max-width: 991px) {
            .login-brand { min-height: 280px; order: 1; }
            .login-form-panel { min-height: auto; order: 2; padding: 2rem 1.5rem; }
        }
        .form-floating label { color: #64748b; }
        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
        }
        .form-control:focus {
            border-color: var(--eris-accent);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.2);
        }
        .form-select {
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            padding: 0.75rem 1rem;
        }
        .form-select:focus {
            border-color: var(--eris-accent);
        }
        .year-selector {
            background: var(--eris-bg);
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            border: 1px solid #ccfbf1;
        }
        .year-selector label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--eris-primary);
            margin-bottom: 0.35rem;
        }
        .btn-login {
            background: linear-gradient(135deg, var(--eris-primary) 0%, #0d9488 100%);
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, var(--eris-primary-hover) 0%, var(--eris-primary) 100%);
            transform: translateY(-1px);
        }
        .login-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
        }
        .form-check-input:checked {
            background-color: var(--eris-primary);
            border-color: var(--eris-primary);
        }
        .forgot-link {
            color: var(--eris-primary);
            font-size: 0.875rem;
        }
        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
        }
        .register-link a {
            color: var(--eris-primary);
            font-weight: 500;
        }
        /* Toast-style message */
        .login-alert {
            border-radius: 0.5rem;
            padding: 0.875rem 1rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            margin-bottom: 1.25rem;
            animation: slideDown 0.3s ease;
        }
        .login-alert.error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: var(--eris-error);
        }
        .login-alert .icon {
            flex-shrink: 0;
            width: 20px;
            height: 20px;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .badge-year {
            background: linear-gradient(135deg, var(--eris-primary) 0%, var(--eris-accent) 100%);
            color: white;
            font-size: 0.75rem;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-brand">
            <div class="login-brand-content">
                <a href="{{ url('/') }}" class="d-inline-block text-decoration-none">
                    <img src="{{ $logoUrl ?? asset('images/setting/general/6205.png') }}" alt="ERIS" class="logo" onerror="this.style.display='none'; this.nextElementSibling.classList.remove('d-none');">
                    <span class="brand-text d-none">ERIS Portal</span>
                </a>
                <p class="brand-tagline mt-2 mb-0">Education Information Management System</p>
            </div>
        </div>
        <div class="login-form-panel">
            <div class="login-form-inner">
            <h1>Sign In</h1>
            <p class="subtitle">Enter your credentials to access your account</p>

            @if(isset($message) && $message)
                <div class="login-alert error" id="loginAlert" role="alert">
                    <svg class="icon" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ $message }}</span>
                </div>
            @endif

            <form action="{{ url('login') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="login" name="login" placeholder="Email or Student ID"
                           value="{{ old('login') }}" required autofocus>
                    <label for="login">Student ID / Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn btn-primary btn-login">Sign In</button>

                <div class="login-footer">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    @if(Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                    @else
                        <a href="#" class="forgot-link">Forgot password?</a>
                    @endif
                </div>
            </form>

            <div class="register-link">
                <a href="{{ url('public-registration') }}">New Scholar Registration</a>
            </div>
            </div>
        </div>
    </div>
    <script>
        // Auto-hide error after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            var alert = document.getElementById('loginAlert');
            if (alert) setTimeout(function(){ alert.style.display = 'none'; }, 5000);
        });
    </script>
</body>
</html>
