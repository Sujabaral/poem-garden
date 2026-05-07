@extends('layout')

@section('content')
    <h1>All Users</h1>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            <strong>Error:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($users->count() === 0)
        <p>No users found.</p>
    @endif

    @foreach ($users as $user)
        <div class="poem-card">
            <h2>{{ $user->name }}</h2>

            <p>{{ $user->email }}</p>

            <a href="/users/{{ $user->id }}">View</a>
            |
            <a href="/users/{{ $user->id }}/edit">Edit</a>

            @if (auth()->id() !== $user->id)
                |
                <form method="POST" action="/users/{{ $user->id }}" style="display: inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">
                        Delete
                    </button>
                </form>
            @else
                <p><em>This is your account. You cannot delete yourself.</em></p>
            @endif
        </div>
    @endforeach
@endsection