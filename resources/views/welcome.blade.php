<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: #edf2f7;
            color: #1a202c;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 10px 35px rgba(0,0,0,0.15);
        }
        .auth-links {
            margin-bottom: 2rem;
        }
        .auth-link {
            display: inline-block;
            text-decoration: none;
            color: #4a5568;
            font-weight: bold;
            margin: 0 1rem;
            padding: 0.5rem 1.5rem;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: all 0.2s ease-in-out;
        }
        .auth-link:hover,
        .auth-link:focus {
            color: #2b6cb0;
            border-color: #2b6cb0;
        }
        .welcome-title {
            margin-bottom: 0.5rem;
            font-size: 2rem;
            font-weight: bold;
        }
        .welcome-subtitle {
            color: #4a5568;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="auth-links">
            @auth
                <a href="{{ url('/dashboard') }}" class="auth-link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="auth-link">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="auth-link">Register</a>
                @endif
            @endauth
        </div>
        <h1 class="welcome-title">Welcome to Laravel</h1>
        <p class="welcome-subtitle">Your application's landing page.</p>
    </div>
</body>
</html>
