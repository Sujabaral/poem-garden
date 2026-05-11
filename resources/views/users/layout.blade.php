<nav>
    <a href="/">Home</a>
    <a href="/about">About</a>

    @auth
        <a href="/poems">Poems</a>
        <a href="/poems/create">Create Poem</a>
        <a href="/account">My Account</a>
        <a href="/poems/trash">Trash</a>

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