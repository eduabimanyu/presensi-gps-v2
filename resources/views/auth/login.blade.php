<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Login | Gawe - Presensi GPS</title>
    <meta name="description" content="Sistem Presensi GPS - Login" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta20/dist/css/tabler.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta20/dist/css/tabler-vendors.min.css">
    
    <style>
        :root {
            --primary: #0D9488;
            --primary-dark: #0F766E;
            --primary-light: #CCFBF1;
            --accent: #F59E0B;
            --bg: #F8FAFC;
            --surface: #FFFFFF;
            --text: #0F172A;
            --text-secondary: #64748B;
            --border: #E2E8F0;
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            color: var(--text);
        }

        /* Left Panel - Branding */
        .brand-panel {
            flex: 1;
            background: linear-gradient(135deg, #0D9488 0%, #0F766E 50%, #115E59 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            position: relative;
            overflow: hidden;
        }

        .brand-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .brand-panel::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -30%;
            width: 80%;
            height: 80%;
            background: radial-gradient(circle, rgba(245,158,11,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .brand-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 400px;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: var(--accent);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 32px;
            font-size: 36px;
            font-weight: 800;
            color: white;
            box-shadow: 0 8px 24px rgba(245,158,11,0.3);
        }

        .brand-title {
            font-size: 32px;
            font-weight: 800;
            color: white;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 16px;
            color: rgba(255,255,255,0.85);
            margin-bottom: 48px;
            line-height: 1.6;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 16px;
            color: white;
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            background: rgba(255,255,255,0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .feature-icon svg {
            width: 22px;
            height: 22px;
            stroke: white;
        }

        .feature-text h4 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .feature-text p {
            font-size: 13px;
            color: rgba(255,255,255,0.75);
        }

        /* Right Panel - Login Form */
        .login-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 60px;
            background: var(--surface);
        }

        .login-container {
            width: 100%;
            max-width: 400px;
        }

        .login-header {
            margin-bottom: 40px;
        }

        .mobile-logo {
            display: none;
            width: 56px;
            height: 56px;
            background: var(--accent);
            border-radius: 14px;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 800;
            color: white;
            margin-bottom: 24px;
        }

        .login-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .login-header p {
            font-size: 15px;
            color: var(--text-secondary);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            font-size: 15px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius);
            background: var(--bg);
            color: var(--text);
            transition: all 0.2s ease;
            font-family: inherit;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--surface);
            box-shadow: 0 0 0 3px var(--primary-light);
        }

        .form-input::placeholder {
            color: var(--text-secondary);
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-secondary);
            display: flex;
            align-items: center;
        }

        .input-icon svg {
            width: 20px;
            height: 20px;
        }

        .input-with-icon .form-input {
            padding-left: 48px;
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: var(--text);
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            border-radius: 4px;
            border: 1.5px solid var(--border);
            cursor: pointer;
            accent-color: var(--primary);
        }

        .remember-me span {
            font-size: 14px;
            color: var(--text-secondary);
        }

        .forgot-link {
            font-size: 14px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .forgot-link svg {
            width: 16px;
            height: 16px;
        }

        .btn-primary {
            width: 100%;
            padding: 14px 24px;
            font-size: 15px;
            font-weight: 600;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: inherit;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(13,148,136,0.3);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary svg {
            width: 20px;
            height: 20px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 16px;
            margin: 28px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        .divider span {
            font-size: 13px;
            color: var(--text-secondary);
        }

        .demo-credentials {
            background: var(--bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
        }

        .demo-title {
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .demo-title svg {
            width: 18px;
            height: 18px;
            color: var(--accent);
        }

        .demo-accounts {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .demo-account {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
        }

        .demo-account .role {
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .demo-account .role svg {
            width: 16px;
            height: 16px;
        }

        .demo-account .credentials {
            font-family: 'SF Mono', Monaco, monospace;
            font-size: 12px;
            background: var(--surface);
            padding: 4px 8px;
            border-radius: 6px;
            border: 1px solid var(--border);
        }

        /* Error Alert */
        .alert-error {
            background: #FEE2E2;
            border: 1px solid #FECACA;
            border-radius: var(--radius);
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #991B1B;
            font-size: 14px;
        }

        .alert-error svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* Responsive */
        @media (max-width: 900px) {
            body {
                flex-direction: column;
            }

            .brand-panel {
                display: none;
            }

            .mobile-logo {
                display: flex;
            }

            .login-panel {
                padding: 32px 24px;
            }
        }

        @media (max-width: 480px) {
            .login-panel {
                padding: 24px 16px;
            }

            .login-header h1 {
                font-size: 24px;
            }

            .form-options {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .demo-account {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }
        }
    </style>
</head>
<body>
    <!-- Left Panel - Branding -->
    <div class="brand-panel">
        <div class="brand-content">
            <div class="logo">G</div>
            <h1 class="brand-title">Gawe</h1>
            <p class="brand-subtitle">Your Workforce, Simplified.<br>Sistem presensi cerdas untuk produktivitas tim.</p>
            
            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-map-pin"></i>
                    </div>
                    <div class="feature-text">
                        <h4>GPS Tracking</h4>
                        <p>Absen akurat berdasarkan lokasi</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-face-id"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Face Recognition</h4>
                        <p>Verifikasi wajah untuk keamanan</p>
                    </div>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="ti ti-chart-line"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Real-time Dashboard</h4>
                        <p>Monitoring kehadiran secara langsung</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="login-panel">
        <div class="login-container">
            <div class="login-header">
                <div class="mobile-logo">G</div>
                <h1>Selamat Datang</h1>
                <p>Masuk ke akun Gawe kamu</p>
            </div>

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="alert-error">
                    <i class="ti ti-alert-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form id="formAuthentication" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="id_user">Username / Email</label>
                    <div class="input-with-icon">
                        <span class="input-icon">
                            <i class="ti ti-user"></i>
                        </span>
                        <input type="text" class="form-input" id="id_user" name="id_user" placeholder="Masukkan username" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-with-icon">
                        <span class="input-icon">
                            <i class="ti ti-lock"></i>
                        </span>
                        <input type="password" class="form-input" id="password" name="password" placeholder="Masukkan password" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">
                            <i class="ti ti-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" id="remember-me" name="remember">
                        <span>Ingat saya</span>
                    </label>
                    <a href="{{ route('password.request') }}" class="forgot-link">
                        <i class="ti ti-help-circle"></i>
                        Lupa password?
                    </a>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="ti ti-login"></i>
                    Masuk
                </button>
            </form>

            <div class="divider">
                <span>Demo Credentials</span>
            </div>

            <div class="demo-credentials">
                <div class="demo-title">
                    <i class="ti ti-info-circle"></i>
                    Akun Demo
                </div>
                <div class="demo-accounts">
                    <div class="demo-account">
                        <span class="role">
                            <i class="ti ti-crown"></i>
                            Super Admin
                        </span>
                        <span class="credentials">adam / adamadifa</span>
                    </div>
                    <div class="demo-account">
                        <span class="role">
                            <i class="ti ti-user"></i>
                            Karyawan
                        </span>
                        <span class="credentials">22.22.224 / 22.22.224</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('ti-eye');
                eyeIcon.classList.add('ti-eye-off');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('ti-eye-off');
                eyeIcon.classList.add('ti-eye');
            }
        }
    </script>
</body>
</html>
