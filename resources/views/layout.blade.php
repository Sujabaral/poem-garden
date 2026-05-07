<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Poem Garden</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff7f0;
            color: #333;
        }

        nav {
            background: #7c3aed;
            padding: 16px 40px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .poem-card {
            border: 1px solid #eee;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 16px;
            background: #fafafa;
        }

        .poem-card a {
            color: #7c3aed;
            font-weight: bold;
            text-decoration: none;
        }

        .poem-card a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            margin: 40px;
            color: #777;
        }
    </style>
</head>
<body>

    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>

        @auth
            <a href="/poems">Poems</a>
            <a href="/poems/create">Create Poem</a>
            <a href="/account">My Account</a>

            <span style="color: white; margin-right: 20px;">
                Hi, {{ auth()->user()->name }}
            </span>

            <form method="POST" action="/logout" style="display: inline;">
                @csrf
                <button type="submit" style="background: white; color: #7c3aed; border: none; padding: 8px 12px; border-radius: 6px;">
                     Logout
                </button>
            </form>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        Made while learning Laravel
    </footer>

</body>
</html>