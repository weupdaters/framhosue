<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Fame House Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800;900&family=Libre+Bodoni:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #080a0e;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        .login-bg-glow {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(249, 199, 0, 0.05) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 3.5rem;
            width: 100%;
            max-width: 420px;
            box-sizing: border-box;
            backdrop-filter: blur(15px);
            position: relative;
            z-index: 2;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.6);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent 0%, var(--primary-color) 50%, transparent 100%);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-logo {
            height: 45px;
            margin-bottom: 1.2rem;
        }

        .login-header h2 {
            font-size: 1.8rem;
            font-weight: 800;
            margin: 0 0 0.5rem 0;
            letter-spacing: -0.5px;
        }

        .login-header p {
            font-size: 0.88rem;
            color: var(--text-secondary);
            margin: 0;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.6rem;
            margin-bottom: 1.6rem;
        }

        .form-group label {
            font-size: 0.78rem;
            font-weight: 700;
            color: rgba(255, 255, 255, 0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-group input {
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 1.1rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.9rem;
            color: #ffffff;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-sizing: border-box;
            width: 100%;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 20px rgba(249, 199, 0, 0.08);
            background: rgba(0, 0, 0, 0.6);
        }

        .login-btn {
            background: #000000;
            border: 1px solid rgba(249, 199, 0, 0.5);
            color: #ffffff;
            padding: 1.1rem;
            font-family: 'Outfit', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
        }

        .login-btn:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: #080a0e;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(249, 199, 0, 0.15);
        }

        .error-alert {
            background: rgba(255, 62, 108, 0.08);
            border: 1px solid rgba(255, 62, 108, 0.2);
            color: #ff3e6c;
            border-radius: 10px;
            padding: 0.8rem 1.2rem;
            font-size: 0.82rem;
            margin-bottom: 1.5rem;
            line-height: 1.4;
        }

        .back-to-site {
            text-align: center;
            margin-top: 2rem;
        }

        .back-to-site a {
            color: var(--text-secondary);
            font-size: 0.85rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-to-site a:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>

    <div class="login-bg-glow"></div>

    <div class="login-card">
        <div class="login-header">
            <img src="{{ asset('images/final short form logo.png') }}" alt="Logo" class="login-logo" style="height: 54px; width: auto; margin-bottom: 1rem;">
            <h2 style="font-size: 1.8rem; font-weight: 800; margin: 0 0 0.5rem 0; letter-spacing: -0.5px;">FAME HOUSE</h2>
            <p>Admin Dashboard Console</p>
        </div>

        @if($errors->any())
            <div class="error-alert">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" placeholder="admin@famehouse.com" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••••••" required>
            </div>

            <button type="submit" class="login-btn">
                <span>Access Console</span>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
        </form>

        <div class="back-to-site">
            <a href="{{ route('home') }}">← Back to Live Site</a>
        </div>
    </div>

</body>
</html>
