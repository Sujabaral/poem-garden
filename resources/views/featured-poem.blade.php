@extends ('layout')

@section ('content')
    <h1>Featured Poem</h1>

    <p><strong>Author:</strong> {{ $poem['author'] }}</p>

    <p>
        {{ $poem['body'] }}
    </p>

    <a href="/poems">View all poems</a>
@endsection