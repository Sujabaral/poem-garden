@extends('layout')

@section('content')
    <h1>All Poems</h1>

    <a href="/poems/create">Submit a new poem</a>
    <br><br>

    @if ($poems->count() === 0)
        <p>No poems found. Add your first poem.</p>
    @endif

    @foreach ($poems as $poem)
        <div class="poem-card">
         @if ($poem->image)
            <img src="{{ asset('storage/' . $poem->image) }}" 
                 alt="{{ $poem->title }}" 
                 width="200">
        @endif   
            <h2>{{ $poem->title }}</h2>

            <p>By {{ $poem->author }}</p>

            <p>{{ $poem->body }}</p>

            <a href="/poems/{{ $poem->id }}">Read More</a>
            |
            <a href="/poems/{{ $poem->id }}/edit">Edit</a>

            <form method="POST" action="/poems/{{ $poem->id }}" style="display: inline;">
                @csrf
                @method('DELETE')

                <button type="submit" onclick="return confirm('Are you sure you want to delete this poem?')">
                    Delete
                </button>
            </form>
        </div>
    @endforeach
@endsection