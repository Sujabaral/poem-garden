@extends('layout')

@section('content')
    <h1>Edit Poem</h1>

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

    <form method="POST" action="/poems/{{ $poem->id }}">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Poem Title</label><br>
            <input type="text" name="title" value="{{ old('title', $poem->title) }}" style="width: 100%; padding: 10px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Author</label><br>
            <input type="text" name="author" value="{{ old('author', $poem->author) }}" style="width: 100%; padding: 10px;">
        </div>
        <div style ="margin-bottom: 15px;">
            <label>Poem Genre</label><br>
            <input type="text" name="genre" value="{{ old('genre', $poem->genre) }}" style="width: 100%; padding: 10px;">
        </div>
        
        <div style="margin-bottom: 15px;">
            <label>Poem Body</label><br>
            <textarea name="body" rows="6" style="width: 100%; padding: 10px;">{{ old('body', $poem->body) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Poem Genre</label><br>
            <input type="text" name="genre" value="{{ old('genre', $poem->genre) }}" style="width: 100%; padding: 10px;">
        </div>
            <div style="margin-bottom: 15px;">
                <label>Change Image</label>
                <input type="file" name="image" accept="image/png, image/jpeg, image/webp, image/gif">
                @error('image')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
        <button type="submit" style="padding: 10px 20px;">
            Update Poem
        </button>
    </form>

    <br>

    <a href="/poems/{{ $poem->id }}">Cancel</a>
@endsection