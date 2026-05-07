@extends('layout')

@section('content')
    <h1>Register</h1>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 15px; border-radius: 10px; margin-bottom: 20px;">
            <strong>Please fix these errors:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Password</label><br>
            <input type="password" name="password" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Confirm Password</label><br>
            <input type="password" name="password_confirmation" style="width: 100%; padding: 10px;">
        </div>

        <button type="submit" style="padding: 10px 20px;">
            Register
        </button>
    </form>

    <p>
        Already have an account?
        <a href="/login">Login here</a>
    </p>
@endsection