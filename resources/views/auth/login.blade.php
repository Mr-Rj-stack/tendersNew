<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .login-box {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-box input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 3px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
        }

        .login-box input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .forgot-password,
        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .forgot-password a,
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover,
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="mt-5">
            @if ($errors->any())
                <div class="col-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (@session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if (@session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session()->has('fail'))
                <div class="alert alert-danger" style="color: red">{{ session('fail') }}</div>
            @endif
        </div>
        <h2>Login</h2>
        <form action="{{ route('loginpost') }}" method="post">
            <input type="text" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            @csrf
        </form>
        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
        <div class="register-link">
            <span>Don't have an account? </span><a href="{{ route('register') }}">Register</a>
        </div>
    </div>
</body>

</html>
