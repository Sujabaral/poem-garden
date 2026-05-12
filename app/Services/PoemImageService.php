<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PoemImageService
{
    public function upload(Request $request): ?string
    {
        if ($request->hasFile('image')) {
            return $request->file('image')->store('poems', 'public');
        }

        return null;
    }

    public function replace(Request $request, ?string $oldImage): ?string
    {
        if ($request->hasFile('image')) {
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            return $request->file('image')->store('poems', 'public');
        }

        return $oldImage;
    }

    public function delete(?string $image): void
    {
        if ($image) {
            Storage::disk('public')->delete($image);
        }
    }
}