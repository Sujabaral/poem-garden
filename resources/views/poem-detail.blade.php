@extends('layout')

@section('content')
    <h1>{{ $poem->title }}</h1>

    <p><strong>Author:</strong> {{ $poem->author }}</p>

    <p>
        {{ $poem->body }}
    </p>
    <div style="background: #f3e8ff; padding: 15px; border-radius: 10px; margin-top: 20px;">
    <h3>Poem Analysis</h3>

    <p><strong>Word Count:</strong> {{ $analysis['word_count'] }}</p>
    <p><strong>Length Type:</strong> {{ $analysis['length_type'] }}</p>
    <p><strong>Quality:</strong> {{ $analysis['quality_message'] }}</p>
</div>
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

