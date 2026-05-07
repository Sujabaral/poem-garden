<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoemRequest;
use App\Models\Poem;
use Illuminate\Support\Facades\Storage;

class PoemController extends Controller
{
    public function index()
    {
        $poems = Poem::latest()->get();

        return view('poems', [
            'poems' => $poems
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

        if ($poem->image) {
            Storage::disk('public')->delete($poem->image);
        }

        $poem->delete();

        return redirect('/poems');
    }
}