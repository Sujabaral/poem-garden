@extends('layout')

@section('content')
    <h1>{{ $poem->title }}</h1>

    <p><strong>Author:</strong> {{ $poem->author }}</p>

    <p>
        {{ $poem->body }}
    </p>
    @if ($poem->image)
    <img src="{{ asset('storage/' . $poem->image) }}" 
         alt="{{ $poem->title }}" 
         width="400">
    @endif
    <a href="/poems/{{ $poem->id }}/edit">Edit Poem</a>
    |
    <a href="/poems">Back to all poems</a>

    <br><br>

    <form method="POST" action="/poems/{{ $poem->id }}">
        @csrf
        @method('DELETE')

        <button type="submit" onclick="return confirm('Are you sure?')">
            Delete Poem
        </button>
    </form>
@endsection