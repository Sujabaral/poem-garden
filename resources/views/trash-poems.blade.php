@extends('layout')

@section('content')
    <h1>Trashed Poems</h1>

    <a href="/poems">Back to all poems</a>
    <br><br>

    @if ($trashedPoems->count() === 0)
        <p>No trashed poems found.</p>
    @else
        @foreach ($trashedPoems as $poem)
            <div class="poem-card">
                <h2>{{ $poem->title }}</h2>
                <p>By {{ $poem->author }}</p>

                <form method="POST" action="{{ route('poems.restore', $poem->id) }}" style="display: inline;">
                    @csrf
                    <button type="submit">Restore</button>
                </form>

                <form method="POST" action="{{ route('poems.force-delete', $poem->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to permanently delete this poem?')">
                        Permanently Delete
                    </button>
                </form>
            </div>
        @endforeach
    @endif
@endsection