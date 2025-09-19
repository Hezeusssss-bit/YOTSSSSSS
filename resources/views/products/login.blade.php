    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <style>
            /* Background with gradient animation */
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #a1c4fd, #c2e9fb);
                background-size: 400% 400%;
                animation: gradientBG 12s ease infinite;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            @keyframes gradientBG {
                0% {background-position: 0% 50%;}
                50% {background-position: 100% 50%;}
                100% {background-position: 0% 50%;}
            }

            /* Login container */
            .login-container {
                background: rgba(255, 255, 255, 0.95);
                padding: 40px 30px;
                border-radius: 20px;
                box-shadow: 0px 10px 30px rgba(0,0,0,0.15);
                width: 350px;
                text-align: center;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .login-container:hover {
                transform: translateY(-8px);
                box-shadow: 0px 15px 40px rgba(0,0,0,0.25);
            }

            h2 {
                margin-bottom: 25px;
                color: #333;
                font-size: 28px;
                letter-spacing: 1px;
            }

            label {
                display: block;
                margin: 10px 0 5px;
                color: #444;
                font-weight: 600;
                text-align: left;
            }

            /* Input fields */
            input {
                width: 90%;
                padding: 12px;
                margin-bottom: 18px;
                border: 1px solid #ccc;
                border-radius: 8px;
                font-size: 15px;
                transition: all 0.3s ease;
            }

            input:focus {
                border-color: #6a11cb;
                box-shadow: 0px 0px 10px rgba(106, 17, 203, 0.3);
                outline: none;
            }

            input:hover {
                border-color: #2575fc;
            }

            /* Button */
            button {
                width: 50%;
                background: linear-gradient(135deg, #6a11cb, #2575fc);
                color: white;
                padding: 14px;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
                letter-spacing: 1px;
                transition: all 0.3s ease;
            }

            button:hover {
                background: linear-gradient(135deg, #2575fc, #6a11cb);
                transform: scale(1.05);
                box-shadow: 0px 6px 15px rgba(0,0,0,0.2);
            }

            /* Error and Success messages */
            .error, .success {
                font-size: 14px;
                margin-bottom: 15px;
                padding: 10px;
                border-radius: 6px;
                animation: fadeIn 0.5s ease;
            }

            .error {
                color: #fff;
                background: #f44336;
            }

            .success {
                color: #fff;
                background:rgb(67, 136, 226);
            }

            @keyframes fadeIn {
                from {opacity: 0; transform: translateY(-10px);}
                to {opacity: 1; transform: translateY(0);}
            }

            /* Small animation if login fails */
            .shake {
                animation: shake 0.3s;
            }

            @keyframes shake {
                0% { transform: translateX(0px); }
                25% { transform: translateX(-5px); }
                50% { transform: translateX(5px); }
                75% { transform: translateX(-5px); }
                100% { transform: translateX(0px); }
            }
        </style>
    </head>
    <body>
        <div class="login-container {{ $errors->any() ? 'shake' : '' }}">
            <h2>Welcome Back 👋</h2>

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

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </body>
    </html>
