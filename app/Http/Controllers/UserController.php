<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        return view('account.show', [
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        $user = $request->user();

        return view('account.edit', [
            'user' => $user
        ]);
    }

    public function update(UpdateAccountRequest $request)
    {
        $user = $request->user();

        $validated = $request->validated();

        $user->update($validated);

        return redirect('/account')->with('success', 'Account updated successfully.');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $user->delete();

        return redirect('/register');
    }
}