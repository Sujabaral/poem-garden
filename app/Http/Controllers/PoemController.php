<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoemRequest;
use App\Models\Poem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class PoemController extends Controller
{
    public function index()
{
    $search = request('search');
    $selectedGenre = request('genre');
    
    $query = Poem::query();

    // Search filter
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%")
              ->orWhere('body', 'like', "%{$search}%");
        });
    }

    // Genre filter
    if ($selectedGenre) {
        $query->where('genre', $selectedGenre);
    }

    $poems = $query->latest()->get();

    // Get unique genres only
    $genres = Poem::whereNotNull('genre')
        ->where('genre', '!=', '')
        ->distinct()
        ->pluck('genre');

    return view('poems', [
        'poems' => $poems,
        'genres' => $genres,
        'search' => $search,
        'selectedGenre' => $selectedGenre,
    ]);
}

    public function create()
    {
        return view('create-poem');
    }

    public function store(PoemRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('poem-images', 'public');
        }

        Poem::create($validated);

        return redirect('/poems');
    }

    public function show($id)
    {
        $poem = Poem::findOrFail($id);

        return view('poem-detail', [
            'poem' => $poem
        ]);
    }

    public function edit($id)
    {
        $poem = Poem::findOrFail($id);

        return view('edit-poem', [
            'poem' => $poem
        ]);
    }

    public function update(PoemRequest $request, $id)
    {
        $poem = Poem::findOrFail($id);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            if ($poem->image) {
                Storage::disk('public')->delete($poem->image);
            }

            $validated['image'] = $request->file('image')->store('poem-images', 'public');
        }

        $poem->update($validated);

        return redirect('/poems/' . $poem->id);
    }

    public function destroy($id)
    {
        $poem = Poem::findOrFail($id);
        $poem->delete();

        return redirect('/poems');
    }
    public function search(PoemRequest $request)
    {
        $query = $request->input('query');

        $poems = Poem::where('title', 'like', "%{$query}%")
            ->orWhere('author', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->get();

        return view('poems', [
            'poems' => $poems
        ]);
    }

    public function trash()
    {
        $trashedPoems = Poem::onlyTrashed()->get();

        return view('trash-poems', [
            'trashedPoems' => $trashedPoems
        ]);
    }
    public function restore(Request $request)   
    {
        $id = $request->route('id');
        $poem = Poem::onlyTrashed()->findOrFail($id);
        $poem->restore();

        return redirect('/poems/trash')->with('success', 'Poem restored successfully.');
    }

    public function forceDelete(Request $request)
    {
        $id = $request->route('id');
        $poem = Poem::onlyTrashed()->findOrFail($id);

        if ($poem->image) {
            Storage::disk('public')->delete($poem->image);
        }

        $poem->forceDelete();

        return redirect('/poems/trash')->with('success', 'Poem permanently deleted.');
    }

    public function deleteImage($id)
{
    $poem = Poem::findOrFail($id);

    if ($poem->image) {
        Storage::disk('public')->delete($poem->image);
        $poem->update([
            'image' => null
        ]);
    }

    return redirect('/poems/' . $poem->id . '/edit')
        ->with('success', 'Image deleted successfully.');
}
}