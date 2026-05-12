@extends('layout')

@section('content')
    <h1>All Poems</h1>

    <a href="/poems/create">Submit a new poem</a>
    <br><br>

    @if ($poems->count() === 0)
        <p>No poems found. Add your first poem.</p>
    @endif


    <form method="GET" action="/poems" style="margin-bottom: 20px;">
     <input 
        type="text" 
        name="search" 
        placeholder="Search poems..."
        value="{{ $search ?? '' }}"
        style="padding: 10px; width: 200px;">

        <select name="genre" style="padding: 10px;">
        <option value="">All Genres</option>

        @foreach ($genres as $genre)
            <option value="{{ $genre }}"
                {{ ($selectedGenre ?? '') == $genre ? 'selected' : '' }}>
                {{ $genre }}
            </option>
        @endforeach
        </select>

        <button type="submit">Search</button>

        <a href="/poems">Clear</a>
    </form>

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

            <a href="/poems/{{ $poem->id }}">Read More|</a>
            
            <a href="/poems/{{ $poem->id }}/edit">Edit</a>
            @auth
                <form method="POST" action="/poems/{{ $poem->id }}/favorite" style="display:inline;">
                @csrf

                    <button type="submit">
                        @if (auth()->user()->favoritePoems->contains($poem->id))
                        ★ Remove Favorite
                        @else
                        ☆ Add Favorite
                        @endif
                    </button>
                </form>
            @endauth
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