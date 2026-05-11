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

    <form method="POST" action="/poems/{{ $poem->id }}" enctype="multipart/form-data">
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

        <div style="margin-bottom: 15px;">
            <label>Poem Body</label><br>
            <textarea name="body" rows="6" style="width: 100%; padding: 10px;">{{ old('body', $poem->body) }}</textarea>
        </div>

        <div style="margin-bottom: 15px;">
            <label>Poem Genre</label><br>
            <select name="genre" class="form-control">
                <option value="">Select Genre</option>
                <option value="Romantic" {{ old('genre', $poem->genre) == 'Romantic' ? 'selected' : '' }}>Romantic</option>
                <option value="Nature" {{ old('genre', $poem->genre) == 'Nature' ? 'selected' : '' }}>Nature</option>
                <option value="Love" {{ old('genre', $poem->genre) == 'Love' ? 'selected' : '' }}>Love</option>
                <option value="Inspirational" {{ old('genre', $poem->genre) == 'Inspirational' ? 'selected' : '' }}>Inspirational</option>
                <option value="Humor" {{ old('genre', $poem->genre) == 'Humor' ? 'selected' : '' }}>Humor</option>
                <option value="Other" {{ old('genre', $poem->genre) == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        @if ($poem->image)
            <div style="margin-bottom: 15px;">
                <label>Current Image</label><br>
                <img src="{{ asset('storage/' . $poem->image) }}" width="200">
            </div>
        @endif

        <div style="margin-bottom: 15px;">
            <label>Change Image</label><br>
            <input type="file" name="image" accept="image/png, image/jpeg, image/webp, image/gif">

            @error('image')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" style="padding: 10px 20px;">
            Update Poem
        </button>
    </form>

    @if ($poem->image)
        <br>

        <form method="POST" action="{{ route('poems.image.delete', $poem->id) }}">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Delete this image?')">
                Delete Image
            </button>
        </form>
    @endif

    <br>

    <a href="/poems/{{ $poem->id }}">Cancel</a>
@endsection