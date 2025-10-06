<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #2d2d2d;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-wrapper {
            display: flex;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0px 20px 60px rgba(0,0,0,0.3);
            width: 900px;
            min-height: 500px;
        }

        .login-left {
            flex: 1;
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 14px;
            font-weight: 600;
            color: #333;
            margin-bottom: 40px;
            letter-spacing: 0.5px;
        }

        h2 {
            font-size: 36px;
            color: #1a1a1a;
            margin-bottom: 40px;
            font-weight: 700;
        }

        .input-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            background: #f5f5f5;
            border-radius: 10px;
            padding: 0 15px;
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within {
            background: #ebebeb;
        }

        .input-icon {
            color: #999;
            margin-right: 10px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 16px 10px;
            border: none;
            background: transparent;
            font-size: 15px;
            color: #333;
            outline: none;
        }

        input::placeholder {
            color: #999;
        }

        .eye-icon {
            color: #999;
            cursor: pointer;
            font-size: 14px;
            padding: 5px;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 15px 0 30px 0;
            font-size: 14px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            padding: 0;
            cursor: pointer;
            accent-color: #1a1a2e;
        }

        .forgot-password {
            color: #666;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #1a1a2e;
        }

        button {
            width: 100%;
            background: #1a1a2e;
            color: white;
            padding: 16px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #0f0f1e;
            transform: translateY(-2px);
            box-shadow: 0px 8px 20px rgba(26, 26, 46, 0.3);
        }

        .login-right {
            flex: 1;
            background: linear-gradient(135deg, #1a1a2e 0%, #2d1b4e 100%);
            position: relative;
            overflow: hidden;
        }

        .login-right::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -20%;
            width: 140%;
            height: 140%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        .error, .success {
            font-size: 14px;
            margin-bottom: 20px;
            padding: 12px 15px;
            border-radius: 10px;
            animation: fadeIn 0.5s ease;
        }

        .error {
            color: #721c24;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        .success {
            color: #155724;
            background: #d4edda;
            border: 1px solid #c3e6cb;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-10px);}
            to {opacity: 1; transform: translateY(0);}
        }

        .shake {
            animation: shake 0.3s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        @media (max-width: 768px) {
            .login-wrapper {
                width: 90%;
                flex-direction: column;
            }
            
            .login-right {
                min-height: 150px;
            }

            .login-left {
                padding: 40px 30px;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper {{ $errors->any() ? 'shake' : '' }}">
        <div class="login-left">
            <div class="logo">MSWD Logo</div>
            
            <h2>Welcome</h2>

            {{-- Success message --}}
            @if(session('Success'))
                <div class="success">{{ session('Success') }}</div>
            @endif

            {{-- Error message --}}
            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="input-icon">✉</span>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <span class="eye-icon" onclick="togglePassword()">👁</span>
                    </div>
                </div>

                <div class="options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember Me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div>

                <button type="submit">Login</button>
            </form>
        </div>

        <div class="login-right"></div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.querySelector('.eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '👁';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁';
            }
        }
    </script>
</body>
</html>