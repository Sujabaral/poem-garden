@extends('layout')

@section('content')
    <h1>My Favorite Poems</h1>

    <a href="/poems">Back to Poems</a>

    <br><br>

    @if ($poems->count() > 0)
        @foreach ($poems as $poem)
            <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 10px;">
                <h2>{{ $poem->title }}</h2>

                <p><strong>Author:</strong> {{ $poem->author }}</p>

                <p>{{ Str::limit($poem->body, 120) }}</p>

                @if ($poem->image)
                    <img src="{{ asset('storage/' . $poem->image) }}"
                         alt="{{ $poem->title }}"
                         width="200">
                @endif

                <br><br>

                <a href="/poems/{{ $poem->id }}">View</a>

                <form method="POST" action="/poems/{{ $poem->id }}/favorite" style="display:inline;">
                    @csrf
                    <button type="submit">★ Remove Favorite</button>
                </form>
            </div>
        @endforeach
    @else
        <p>You have no favorite poems yet.</p>
    @endif
@endsection