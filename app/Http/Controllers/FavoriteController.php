<?php

namespace App\Http\Controllers;
use App\Models\Poem;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function index(Request $request)
    {
        $poems = $request->user()
            ->favoritePoems()
            ->latest()
            ->get();

        return view('favorites', [
            'poems' => $poems,
        ]);
    }

    public function toggle(Request $request, $id)
    {
        $poem = Poem::findOrFail($id);

        $request->user()->favoritePoems()->toggle($poem->id);

        return back();
    }
}
