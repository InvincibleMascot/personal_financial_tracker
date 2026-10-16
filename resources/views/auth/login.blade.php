<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login | THE VAULT - Personal Finance Manager</title>
    <link rel="icon" href="{{ asset('assets/img/logo.jpg') }}" type="image/jpeg">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.jpg') }}" type="image/jpeg">
    <link rel="apple-touch-icon" href="{{ asset('assets/img/logo.jpg') }}">

    <!-- Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="{{ asset('assets/css/bootstrap-icons.min.css') }}" rel="stylesheet">

    <style>
        :root {
            --font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            /* Blue Theme Translations from the Reference */
            --bg-deep-blue: #06152d;
            --bg-mid-blue: #0a224a;
            --bg-glow-blue: #10346d;
            --card-navy-bg: #092044;
            --card-navy-dark: #061733;
            --btn-blue: #2272e5;
            --btn-blue-hover: #195fc7;
            --btn-cyan-soft: #38bdf8;
            --input-dark-fill: rgba(3, 14, 34, 0.48);
            --input-border-color: rgba(255, 255, 255, 0.12);
            --input-border-focus: #3b82f6;
            --text-label: #8ea4c2;
            --text-placeholder: #5d7596;
            --card-border-radius: 40px;
            --pill-border-radius: 28px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-family);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 16px;
            position: relative;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;

            /* Deep Royal Navy Background matching reference atmosphere */
            background-color: var(--bg-deep-blue);
            background-image:
                radial-gradient(circle at 18% 20%, rgba(30, 95, 205, 0.45) 0%, transparent 45%),
                radial-gradient(circle at 82% 80%, rgba(0, 195, 255, 0.22) 0%, transparent 45%),
                linear-gradient(145deg, var(--bg-deep-blue) 0%, var(--bg-mid-blue) 48%, var(--bg-glow-blue) 100%);
        }

        /* ----------------------------------------------------
           Floating Bokeh Blur Bubbles (Exact Match to Reference)
        ----------------------------------------------------- */
        .bokeh-backdrop {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .bokeh-bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(2px);
        }

        .bubble-pos-1 {
            width: 260px;
            height: 260px;
            top: -50px;
            left: 8%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08) 0%, rgba(255, 255, 255, 0.01) 70%);
        }

        .bubble-pos-2 {
            width: 140px;
            height: 140px;
            bottom: 60px;
            left: 4%;
            background: radial-gradient(circle, rgba(0, 210, 255, 0.12) 0%, transparent 70%);
        }

        .bubble-pos-3 {
            width: 200px;
            height: 200px;
            top: 25%;
            right: 6%;
            background: radial-gradient(circle, rgba(56, 148, 255, 0.12) 0%, transparent 70%);
        }

        .bubble-pos-4 {
            width: 90px;
            height: 90px;
            bottom: 110px;
            right: 14%;
            background: rgba(255, 255, 255, 0.06);
        }

        .bubble-pos-5 {
            width: 55px;
            height: 55px;
            top: 14%;
            left: 28%;
            background: rgba(255, 255, 255, 0.05);
        }

        /* ----------------------------------------------------
           Main Floating Login Card
        ----------------------------------------------------- */
        .vault-card-container {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1080px;
            min-height: 620px;
            background: var(--card-navy-bg);
            border-radius: var(--card-border-radius);
            box-shadow: 
                0 35px 85px -15px rgba(1, 8, 24, 0.75),
                0 0 0 1px rgba(255, 255, 255, 0.14);
            display: flex;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        /* ----------------------------------------------------
           LEFT SIDE: White Organic Wave Panel with Illustration
           (Exact visual architecture of user's reference image)
        ----------------------------------------------------- */
        .card-left-wave-panel {
            position: relative;
            flex: 1.18;
            background: #ffffff;
            padding: 42px 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: visible;
            z-index: 5;
        }

        /* Smooth Organic S-Curve attached to right edge */
        .wave-svg-connector {
            position: absolute;
            top: 0;
            right: -68px;
            width: 70px;
            height: 100%;
            pointer-events: none;
            z-index: 6;
        }

        /* Ambient subtle bubbles inside white canvas (matching reference) */
        .white-decor-bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(15, 79, 191, 0.04);
            pointer-events: none;
        }

        .decor-b1 { width: 140px; height: 140px; top: 12%; left: 8%; }
        .decor-b2 { width: 80px; height: 80px; bottom: 22%; left: 16%; }
        .decor-b3 { width: 50px; height: 50px; top: 38%; right: 18%; }

        /* Top Brand on White Background */
        .brand-top-row {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            position: relative;
            z-index: 10;
        }

        .brand-icon-box {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--btn-blue);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 4px 14px rgba(34, 114, 229, 0.35);
            overflow: hidden;
            padding: 0;
        }

        .brand-logo-img,
        .mobile-brand-logo-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: inherit;
        }

        .brand-text-column {
            display: flex;
            flex-direction: column;
        }

        .brand-main-name {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: 1.2px;
            color: #081d3f;
            line-height: 1.15;
        }

        .brand-sub-name {
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
            letter-spacing: 0.3px;
        }

        /* Center 3D Vector Illustration (Seamlessly matches white canvas) */
        .center-art-area {
            margin: auto 0;
            padding: 12px 0;
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .center-art-image {
            max-width: 380px;
            width: 100%;
            height: auto;
            display: inline-block;
            transition: transform 0.3s ease;
        }

        .center-art-image:hover {
            transform: scale(1.02);
        }

        /* Bottom-Left Copyright (Exact position from reference image) */
        .left-bottom-copyright {
            position: relative;
            z-index: 10;
            font-size: 11.5px;
            color: #8c9eb5;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .left-bottom-copyright i {
            color: #10b981;
            font-size: 13px;
        }

        /* ----------------------------------------------------
           RIGHT SIDE: Dark Navy Form Panel
           (Exact layout & inputs from user's reference image)
        ----------------------------------------------------- */
        .card-right-form-panel {
            flex: 0.95;
            padding: 48px 46px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 5;
            color: #ffffff;
        }

        /* Heading */
        .login-heading-box {
            margin-bottom: 28px;
        }

        .login-title-text {
            font-size: 36px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }

        .login-subtitle-text {
            font-size: 13.5px;
            color: var(--text-label);
            font-weight: 500;
        }

        /* Alerts & Feedback */
        .alert-pill-box {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            border-radius: var(--pill-border-radius);
            font-size: 13px;
            line-height: 1.4;
            margin-bottom: 20px;
        }

        .alert-pill-danger {
            background: rgba(220, 38, 38, 0.2);
            border: 1px solid rgba(239, 68, 68, 0.4);
            color: #fca5a5;
        }

        .alert-pill-success {
            background: rgba(16, 185, 129, 0.2);
            border: 1px solid rgba(52, 211, 153, 0.4);
            color: #6ee7b7;
        }

        /* Pill Input Controls (Matches Reference Image) */
        .pill-field-group {
            margin-bottom: 20px;
            position: relative;
        }

        .pill-field-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-label);
            margin-bottom: 8px;
            letter-spacing: 0.2px;
        }

        .pill-input-box {
            position: relative;
            display: flex;
            align-items: center;
            background: var(--input-dark-fill);
            border: 1.5px solid var(--input-border-color);
            border-radius: var(--pill-border-radius);
            backdrop-filter: blur(8px);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .pill-input-box:focus-within {
            background: rgba(1, 10, 26, 0.7);
            border-color: var(--input-border-focus);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.25);
        }

        .pill-input-box.is-invalid {
            border-color: #ef4444;
            background: rgba(239, 68, 68, 0.12);
        }

        .pill-input-icon {
            width: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #627b9d;
            font-size: 16px;
            flex-shrink: 0;
            transition: color 0.2s ease;
        }

        .pill-input-box:focus-within .pill-input-icon {
            color: #60a5fa;
        }

        .pill-input-control {
            flex: 1;
            height: 48px;
            background: transparent;
            border: none;
            outline: none;
            font-family: var(--font-family);
            font-size: 14.5px;
            font-weight: 500;
            color: #ffffff;
            padding: 0 18px 0 0;
        }

        .pill-input-control::placeholder {
            color: var(--text-placeholder);
            font-weight: 400;
        }

        /* Password SHOW Text Toggle */
        .btn-pill-show {
            background: transparent;
            border: none;
            outline: none;
            padding: 0 18px;
            font-family: var(--font-family);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.8px;
            color: #60a5fa;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-transform: uppercase;
            transition: color 0.15s ease, transform 0.15s ease;
        }

        .btn-pill-show:hover {
            color: #93c5fd;
            transform: scale(1.05);
        }

        /* Forgot Password Link directly under password field */
        .forgot-link-subrow {
            display: flex;
            justify-content: flex-end;
            margin-top: 6px;
        }

        .link-forgot-subtle {
            font-size: 12px;
            color: var(--text-label);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.15s ease;
        }

        .link-forgot-subtle:hover {
            color: #60a5fa;
            text-decoration: underline;
        }

        /* Error Text */
        .pill-error-text {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #f87171;
            font-size: 12px;
            font-weight: 600;
            margin-top: 6px;
            padding-left: 6px;
        }

        /* Caps Lock Warning */
        .caps-warning-pill {
            display: none;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            padding: 4px 10px;
            border-radius: 6px;
            background: rgba(245, 158, 11, 0.2);
            border: 1px solid rgba(245, 158, 11, 0.4);
            color: #fbbf24;
            font-size: 11.5px;
            font-weight: 600;
        }

        /* Remember Me Row */
        .pill-remember-row {
            display: flex;
            align-items: center;
            margin-bottom: 22px;
        }

        .pill-remember-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-label);
            user-select: none;
        }

        .pill-remember-label input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 17px;
            height: 17px;
            border: 1.5px solid #4a638a;
            border-radius: 4px;
            background: rgba(4, 15, 36, 0.45);
            cursor: pointer;
            display: grid;
            place-content: center;
            transition: all 0.15s ease;
        }

        .pill-remember-label input[type="checkbox"]:checked {
            background: var(--btn-blue);
            border-color: var(--btn-blue);
        }

        .pill-remember-label input[type="checkbox"]:checked::after {
            content: '';
            width: 4.5px;
            height: 8.5px;
            border: solid #ffffff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
            margin-bottom: 1.5px;
        }

        /* Main Pill Action Button (Matches User's Reference Button) */
        .btn-main-action {
            width: 100%;
            height: 50px;
            border-radius: var(--pill-border-radius);
            background: linear-gradient(135deg, var(--btn-blue) 0%, #1a62cc 100%);
            border: none;
            color: #ffffff;
            font-family: var(--font-family);
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 0.3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            box-shadow: 0 10px 26px rgba(34, 114, 229, 0.4);
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .btn-main-action:hover {
            background: linear-gradient(135deg, var(--btn-blue-hover) 0%, #1550a8 100%);
            box-shadow: 0 12px 30px rgba(34, 114, 229, 0.5);
            transform: translateY(-1px);
        }

        .btn-main-action:active {
            transform: translateY(1px);
            box-shadow: 0 4px 14px rgba(34, 114, 229, 0.25);
        }

        /* Loading Spinner */
        .btn-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2.5px solid rgba(255, 255, 255, 0.35);
            border-top-color: #ffffff;
            border-radius: 50%;
            animation: spinBtn 0.7s linear infinite;
        }

        @keyframes spinBtn {
            to { transform: rotate(360deg); }
        }

        .btn-main-action.loading .btn-text-content,
        .btn-main-action.loading .btn-arrow-icon {
            display: none;
        }

        .btn-main-action.loading .btn-spinner {
            display: block;
        }

        .btn-main-action.loading {
            pointer-events: none;
            opacity: 0.9;
        }

        /* Bottom Footer Sublinks (Exact Match to Reference Image) */
        .bottom-sublinks-row {
            margin-top: 26px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11.5px;
            color: #647d9f;
        }

        .bottom-sublinks-row a {
            color: #7b94b5;
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .bottom-sublinks-row a:hover {
            color: #93c5fd;
            text-decoration: underline;
        }

        /* Mobile Header */
        .mobile-wave-header {
            display: none;
            text-align: center;
            margin-bottom: 24px;
        }

        .mobile-brand-icon-circ {
            width: 48px;
            height: 48px;
            margin: 0 auto 10px auto;
            border-radius: 14px;
            background: var(--btn-blue);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            box-shadow: 0 6px 18px rgba(34, 114, 229, 0.35);
            overflow: hidden;
            padding: 0;
        }

        .mobile-brand-name-title {
            font-size: 22px;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 0.8px;
        }

        .mobile-brand-sub-title {
            font-size: 11.5px;
            font-weight: 600;
            color: var(--text-label);
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        /* ----------------------------------------------------
           Responsive Breakpoints
        ----------------------------------------------------- */
        @media (max-width: 960px) {
            .vault-card-container {
                flex-direction: column;
                max-width: 480px;
                min-height: auto;
                border-radius: 28px;
            }

            .card-left-wave-panel {
                display: none;
            }

            .mobile-wave-header {
                display: block;
            }

            .card-right-form-panel {
                padding: 38px 28px;
            }

            .login-heading-box {
                text-align: center;
                margin-bottom: 22px;
            }

            .login-title-text {
                font-size: 30px;
            }

            .bottom-sublinks-row {
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 16px 10px;
            }

            .card-right-form-panel {
                padding: 28px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- Ambient Floating Bokeh Blur Bubbles (From Reference) -->
    <div class="bokeh-backdrop">
        <div class="bokeh-bubble bubble-pos-1"></div>
        <div class="bokeh-bubble bubble-pos-2"></div>
        <div class="bokeh-bubble bubble-pos-3"></div>
        <div class="bokeh-bubble bubble-pos-4"></div>
        <div class="bokeh-bubble bubble-pos-5"></div>
    </div>

    <!-- Main Floating Card Container -->
    <main class="vault-card-container" role="main">

        <!-- ====================================================
             LEFT SIDE: White Organic Wave Panel with Illustration
             (Exact structure of user's reference image)
        ==================================================== -->
        <section class="card-left-wave-panel" aria-label="Brand Overview">
            
            <!-- Soft Ambient Bubbles on White Canvas -->
            <div class="white-decor-bubble decor-b1"></div>
            <div class="white-decor-bubble decor-b2"></div>
            <div class="white-decor-bubble decor-b3"></div>

            <!-- Top Brand -->
            <div class="brand-top-row">
                <div class="brand-icon-box">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="THE VAULT Logo" class="brand-logo-img">
                </div>
                <div class="brand-text-column">
                    <span class="brand-main-name">THE VAULT</span>
                    <span class="brand-sub-name">Personal finance manager</span>
                </div>
            </div>

            <!-- Center Artwork (3D Finance Vector Illustration matching reference style) -->
            <div class="center-art-area">
                <img src="{{ asset('assets/images/vault_finance_illustration.jpg') }}"
                     alt="THE VAULT Personal Finance & Wealth Ledger"
                     class="center-art-image"
                     loading="eager">
            </div>

            <!-- Bottom Left Info & Copyright (Matches Reference) -->
            <div class="left-bottom-copyright">
                <i class="bi bi-shield-check"></i>
                <span>&copy; {{ date('Y') }} THE VAULT &bull; Powered by Vault Security</span>
            </div>

            <!-- Seamless SVG Wave Connector attached to right edge -->
            <svg class="wave-svg-connector" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L30,0 C65,26 15,68 85,100 L0,100 Z" fill="#ffffff" />
            </svg>
        </section>

        <!-- ====================================================
             RIGHT SIDE: Dark Navy Form Panel
             (Exact layout & pill inputs from user's reference image)
        ==================================================== -->
        <section class="card-right-form-panel">

            <!-- Mobile-Only Brand Header -->
            <div class="mobile-wave-header">
                <div class="mobile-brand-icon-circ">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="THE VAULT Logo" class="mobile-brand-logo-img">
                </div>
                <div class="mobile-brand-name-title">THE VAULT</div>
                <div class="mobile-brand-sub-title">Personal finance manager</div>
            </div>

            <!-- Heading -->
            <div class="login-heading-box">
                <h1 class="login-title-text">Login</h1>
                <p class="login-subtitle-text">Enter your credentials to access your secure Vault.</p>
            </div>

            <!-- Session Status Alert -->
            @if (session('status'))
                <div class="alert-pill-box alert-pill-success" role="alert">
                    <i class="bi bi-check-circle-fill"></i>
                    <div>{{ session('status') }}</div>
                </div>
            @endif

            <!-- Validation Error Alert -->
            @if ($errors->any())
                <div class="alert-pill-box alert-pill-danger" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <div>
                        @if ($errors->has('email'))
                            {{ $errors->first('email') }}
                        @elseif ($errors->has('password'))
                            {{ $errors->first('password') }}
                        @else
                            Please check your credentials and try again.
                        @endif
                    </div>
                </div>
            @endif

            <!-- Sign In Form -->
            <form method="POST" action="{{ route('login') }}" id="vaultLoginForm" novalidate>
                @csrf

                <!-- Username / Email Field (Pill Style) -->
                <div class="pill-field-group">
                    <label for="email" class="pill-field-label">Username</label>
                    <div class="pill-input-box @error('email') is-invalid @enderror">
                        <span class="pill-input-icon">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="Enter your username"
                               class="pill-input-control">
                    </div>
                    @error('email')
                        <div class="pill-error-text">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password Field with SHOW Toggle (Pill Style) -->
                <div class="pill-field-group">
                    <label for="password" class="pill-field-label">Password</label>
                    <div class="pill-input-box @error('password') is-invalid @enderror">
                        <span class="pill-input-icon">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="Enter your password"
                               class="pill-input-control">

                        <!-- Interactive SHOW Button -->
                        <button type="button"
                                id="btnTogglePassword"
                                class="btn-pill-show"
                                title="Toggle password visibility"
                                aria-label="Show or hide password">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                            <span id="toggleText">SHOW</span>
                        </button>
                    </div>

                    <!-- Forgot Password Link directly below password field (Matching Reference) -->
                    <div class="forgot-link-subrow">
                        @if (Route::has('password.request'))
                            <a class="link-forgot-subtle" href="{{ route('password.request') }}">
                                Forgot Password?
                            </a>
                        @endif
                    </div>

                    <!-- Caps Lock Warning -->
                    <div id="capsLockWarning" class="caps-warning-pill">
                        <i class="bi bi-exclamation-circle"></i>
                        <span>Caps Lock is ON</span>
                    </div>

                    @error('password')
                        <div class="pill-error-text">
                            <i class="bi bi-exclamation-circle-fill"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="pill-remember-row">
                    <label for="remember_me" class="pill-remember-label">
                        <input id="remember_me"
                               type="checkbox"
                               name="remember"
                               {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember me</span>
                    </label>
                </div>

                <!-- Main Action Button (Pill Button Matching Reference) -->
                <button type="submit" id="btnSubmitForm" class="btn-main-action">
                    <span class="btn-spinner"></span>
                    <span class="btn-text-content">Login to Vault</span>
                    <i class="bi bi-arrow-right btn-arrow-icon"></i>
                </button>
            </form>

            <!-- Bottom Sublinks (Terms & Contact from Reference Image) -->
            <div class="bottom-sublinks-row">
                <a href="javascript:void(0);">Terms and Services</a>
                <a href="javascript:void(0);">Have a problem? Contact us</a>
            </div>

        </section>

    </main>

    <!-- Client Interactivity Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Password Visibility Toggle
            const btnTogglePassword = document.getElementById('btnTogglePassword');
            const passwordInput = document.getElementById('password');
            const toggleText = document.getElementById('toggleText');
            const toggleIcon = document.getElementById('toggleIcon');

            if (btnTogglePassword && passwordInput && toggleText && toggleIcon) {
                btnTogglePassword.addEventListener('click', function () {
                    const isPassword = passwordInput.getAttribute('type') === 'password';
                    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

                    if (isPassword) {
                        toggleText.textContent = 'HIDE';
                        toggleIcon.classList.remove('bi-eye');
                        toggleIcon.classList.add('bi-eye-slash');
                    } else {
                        toggleText.textContent = 'SHOW';
                        toggleIcon.classList.remove('bi-eye-slash');
                        toggleIcon.classList.add('bi-eye');
                    }
                });
            }

            // 2. Caps Lock Warning Detector
            const capsWarning = document.getElementById('capsLockWarning');
            if (passwordInput && capsWarning) {
                ['keydown', 'keyup'].forEach(eventType => {
                    passwordInput.addEventListener(eventType, function (e) {
                        if (e.getModifierState && e.getModifierState('CapsLock')) {
                            capsWarning.style.display = 'inline-flex';
                        } else {
                            capsWarning.style.display = 'none';
                        }
                    });
                });

                passwordInput.addEventListener('blur', function () {
                    capsWarning.style.display = 'none';
                });
            }

            // 3. Form Submit Feedback (Loader Spinner)
            const form = document.getElementById('vaultLoginForm');
            const submitBtn = document.getElementById('btnSubmitForm');

            if (form && submitBtn) {
                form.addEventListener('submit', function () {
                    if (form.checkValidity()) {
                        submitBtn.classList.add('loading');
                    }
                });
            }
        });
    </script>
</body>

</html>
