@extends('layouts.app')
@section('title', 'Login | JMPSSS - Jaypee Model Senior Secondary School')

@php
    $hasRegisterErrors = $errors->hasBag('register') && $errors->getBag('register')->any();
    $initialAuthMode = old('auth_mode', session('auth_mode', $hasRegisterErrors ? 'register' : 'login'));
@endphp

@push('styles')
<style>
    .login-page-wrapper {
        background: #fdfaf5;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 100px 20px;
        position: relative;
        overflow: hidden;
    }

    .login-bg-decoration {
        position: absolute;
        inset: 0;
        z-index: 0;
        overflow: hidden;
    }

    .login-bg-decoration div {
        position: absolute;
        background: rgba(122, 186, 68, 0.05);
        border-radius: 50%;
    }

    .login-circle-1 {
        width: 600px;
        height: 600px;
        top: -200px;
        right: -100px;
    }

    .login-circle-2 {
        width: 400px;
        height: 400px;
        bottom: -150px;
        left: -100px;
    }

    .login-card {
        background: #fff;
        width: 100%;
        max-width: 480px;
        border-radius: 20px;
        box-shadow: 0 30px 60px rgba(5, 27, 49, 0.12);
        position: relative;
        z-index: 10;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .login-header {
        background: var(--primary-color);
        color: #fff;
        padding: 40px 40px 30px;
        text-align: center;
    }

    .login-form-logo {
        margin-bottom: 12px;
    }

    .login-form-logo img {
        height: 80px;
        border-radius: 20px;
        background: #fff;
        padding: 4px;
        display: inline-block;
        width: auto;
    }

    .login-header h1 {
        font-family: 'Outfit', sans-serif;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .login-header p {
        font-size: 14px;
        opacity: 0.8;
        letter-spacing: 0.5px;
    }

    .auth-mode-tabs {
        display: flex;
        background: #f8fafc;
        border-bottom: 1px solid #edf2f7;
    }

    .auth-mode-tab {
        flex: 1;
        padding: 15px;
        text-align: center;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        color: #64748b;
        transition: 0.3s;
        border: none;
        background: transparent;
        border-bottom: 2px solid transparent;
        font-family: 'Outfit', sans-serif;
    }

    .auth-mode-tab.active {
        color: var(--secondary-color);
        border-bottom-color: var(--secondary-color);
        background: #fff;
    }

    .auth-panel {
        display: none;
    }

    .auth-panel.active {
        display: block;
    }

    .login-tabs {
        display: flex;
        background: #f8fafc;
        border-bottom: 1px solid #edf2f7;
    }

    .login-tab {
        flex: 1;
        padding: 13px 10px;
        text-align: center;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        color: #64748b;
        transition: 0.3s;
        border-bottom: 2px solid transparent;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .login-tab.active {
        color: var(--secondary-color);
        border-bottom-color: var(--secondary-color);
        background: #fff;
    }

    .login-form-body {
        padding: 40px;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
        color: var(--primary-color);
    }

    .form-group i {
        position: absolute;
        left: 15px;
        bottom: 13px;
        color: #94a3b8;
        font-size: 16px;
    }

    .form-group input {
        width: 100%;
        padding: 12px 15px 12px 45px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 15px;
        font-family: inherit;
        transition: 0.3s;
        background: #fcfcfc;
    }

    .form-group input:focus {
        outline: none;
        border-color: var(--secondary-color);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(225, 76, 30, 0.08);
    }

    .form-group input.input-error {
        border-color: #ef4444;
    }

    .form-group input.input-error:focus {
        border-color: #ef4444;
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.08);
    }

    .form-error {
        margin-top: 6px;
        font-size: 12px;
        color: #dc2626;
        font-weight: 600;
    }

    .form-alert {
        background: #fff1f2;
        border: 1px solid #fecdd3;
        color: #be123c;
        border-radius: 12px;
        padding: 12px 14px;
        margin-bottom: 20px;
        font-size: 13px;
        font-weight: 500;
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        font-size: 13px;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #64748b;
        cursor: pointer;
    }

    .forgot-password {
        color: var(--secondary-color);
        text-decoration: none;
        font-weight: 600;
    }

    .login-submit-btn {
        width: 100%;
        padding: 15px;
        background: var(--secondary-color);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        font-family: 'Outfit', sans-serif;
        cursor: pointer;
        transition: 0.3s;
        box-shadow: 0 10px 20px rgba(225, 76, 30, 0.2);
    }

    .login-submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(225, 76, 30, 0.3);
        background: #f35825;
    }

    .form-note {
        margin-top: 18px;
        text-align: center;
        font-size: 13px;
        color: #64748b;
    }

    .form-note a {
        color: var(--secondary-color);
        font-weight: 700;
        text-decoration: none;
    }

    .register-title {
        margin: 0 0 18px;
        color: var(--primary-color);
        font-size: 20px;
        font-weight: 700;
        font-family: 'Outfit', sans-serif;
        text-align: center;
    }

    .login-footer {
        padding: 0 40px 40px;
        text-align: center;
        font-size: 13px;
        color: #64748b;
    }

    .login-footer a {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 700;
    }

    @media (max-width: 500px) {
        .login-card {
            border-radius: 0;
        }

        .login-form-body {
            padding: 30px;
        }

        .login-form-logo img {
            height: 50px;
        }
    }
</style>
@endpush

@section('content')
    <main class="login-page-wrapper">
        <div class="login-bg-decoration">
            <div class="login-circle-1"></div>
            <div class="login-circle-2"></div>
        </div>

        <div class="login-card" id="portalAuthCard" data-initial-auth="{{ $initialAuthMode }}">
            <div class="login-header">
                <div class="login-form-logo">
                    <img src="{{ asset('assets/jmpsss/logo.png') }}" alt="JMPSSS Logo">
                </div>
                <h1>Welcome Back</h1>
            </div>

            <div class="auth-panel {{ $initialAuthMode === 'login' ? 'active' : '' }}" data-auth-panel="login">
                <div class="login-tabs">
                    <div class="login-tab active" data-type="student">Portal Login</div>
                </div>

                <div class="login-form-body">
                    @if ($errors->hasBag('login') && $errors->login->any())
                        <div class="form-alert">{{ $errors->login->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" id="loginForm" novalidate>
                        @csrf
                        <input type="hidden" name="auth_mode" value="login">

                        <div class="form-group">
                            <label for="login_identifier">Email or Mobile Number</label>
                            <i class="fa-solid fa-user-circle"></i>
                            <input type="text" id="login_identifier" name="login_identifier" placeholder="Enter email or mobile"
                                value="{{ old('login_identifier') }}"
                                class="{{ $errors->hasBag('login') && $errors->login->has('login_identifier') ? 'input-error' : '' }}"
                                required>
                            @error('login_identifier', 'login')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="login_password">Password</label>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="login_password" name="login_password" placeholder="********"
                                class="{{ $errors->hasBag('login') && $errors->login->has('login_password') ? 'input-error' : '' }}"
                                required>
                            @error('login_password', 'login')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-options">
                            <label class="remember-me">
                                <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                                Remember me
                            </label>
                            <a href="#" class="forgot-password" onclick="return false;">Forgot Password?</a>
                        </div>

                        <button type="submit" class="login-submit-btn">Authorize &amp; Login</button>
                    </form>

                    <div class="form-note">
                        New user? <a href="#" data-switch-mode="register">Create an account</a>
                    </div>
                </div>
            </div>

            <div class="auth-panel {{ $initialAuthMode === 'register' ? 'active' : '' }}" data-auth-panel="register">
                <div class="login-form-body">
                    <h2 class="register-title">Create New Account</h2>

                    @if ($errors->hasBag('register') && $errors->register->any())
                        <div class="form-alert">{{ $errors->register->first() }}</div>
                    @endif

                    <form method="POST" action="{{ route('register.post') }}" id="registerForm" novalidate>
                        @csrf
                        <input type="hidden" name="auth_mode" value="register">

                        <div class="form-group">
                            <label for="register_name">Full Name</label>
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="register_name" name="register_name" placeholder="Enter your full name"
                                value="{{ old('register_name') }}"
                                class="{{ $errors->hasBag('register') && $errors->register->has('register_name') ? 'input-error' : '' }}"
                                required>
                            @error('register_name', 'register')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-grid-2" style="display: grid; grid-template-columns: 1fr; gap: 0;">
                            <div class="form-group">
                                <label for="register_email">Email Address</label>
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" id="register_email" name="register_email"
                                    placeholder="Enter your email address" value="{{ old('register_email') }}"
                                    class="{{ $errors->hasBag('register') && $errors->register->has('register_email') ? 'input-error' : '' }}"
                                    required>
                                @error('register_email', 'register')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="register_mobile">Mobile Number</label>
                                <i class="fa-solid fa-phone"></i>
                                <input type="text" id="register_mobile" name="register_mobile"
                                    placeholder="Enter mobile number" value="{{ old('register_mobile') }}"
                                    class="{{ $errors->hasBag('register') && $errors->register->has('register_mobile') ? 'input-error' : '' }}"
                                    required>
                                @error('register_mobile', 'register')
                                    <div class="form-error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="register_password">Password</label>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="register_password" name="register_password" placeholder="Minimum 6 characters"
                                class="{{ $errors->hasBag('register') && $errors->register->has('register_password') ? 'input-error' : '' }}"
                                required>
                            @error('register_password', 'register')
                                <div class="form-error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="register_password_confirmation">Confirm Password</label>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="register_password_confirmation" name="register_password_confirmation"
                                placeholder="Re-enter your password" required>
                        </div>

                        <button type="submit" class="login-submit-btn">Create Account</button>
                    </form>

                    <div class="form-note">
                        Already have an account? <a href="#" data-switch-mode="login">Sign in</a>
                    </div>
                </div>
            </div>

            <div class="login-footer">
                Having trouble logging in? <a href="{{ route('contact') }}">Contact Support</a>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const card = document.getElementById('portalAuthCard');
        if (!card) {
            return;
        }

        const authButtons = card.querySelectorAll('[data-auth-mode]');
        const authPanels = card.querySelectorAll('[data-auth-panel]');
        const switchLinks = card.querySelectorAll('[data-switch-mode]');
        const initialMode = card.dataset.initialAuth === 'register' ? 'register' : 'login';

        const setAuthMode = function (mode) {
            authButtons.forEach(function (button) {
                button.classList.toggle('active', button.dataset.authMode === mode);
            });

            authPanels.forEach(function (panel) {
                panel.classList.toggle('active', panel.dataset.authPanel === mode);
            });
        };

        authButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                setAuthMode(button.dataset.authMode);
            });
        });

        switchLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                setAuthMode(link.dataset.switchMode);
            });
        });

        const roleTabs = card.querySelectorAll('.login-tab');
        const loginEmailInput = document.getElementById('login_email');

        roleTabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                roleTabs.forEach(function (item) {
                    item.classList.remove('active');
                });
                tab.classList.add('active');

                if (!loginEmailInput) {
                    return;
                }

                const type = tab.getAttribute('data-type');
                if (type === 'student') {
                    loginEmailInput.placeholder = 'Enter student email address';
                } else if (type === 'faculty') {
                    loginEmailInput.placeholder = 'Enter faculty email address';
                } else {
                    loginEmailInput.placeholder = 'Enter parent email address';
                }
            });
        });

        setAuthMode(initialMode);
    });
</script>
@endpush
