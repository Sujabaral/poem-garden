@extends('layout')

@section('content')
    <h1>My Account</h1>

    <p><strong>Name:</strong> {{ $user->name }}</p>

    <p><strong>Email:</strong> {{ $user->email }}</p>

    <p><strong>Joined:</strong> {{ $user->created_at->format('F j, Y') }}</p>

    <a href="/account/edit">Edit My Account</a>

    <br><br>

    <form method="POST" action="/account">
        @csrf
        @method('DELETE')

        <button type="submit" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')">
            Delete My Account
        </button>
    </form>
@endsection