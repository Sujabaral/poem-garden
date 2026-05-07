<?php

namespace App\Support;

use App\Models\Poem;

class PoemReporter
{
    public function totalPoems(): int
    {
        return Poem::count();
    }

    public function poemsWithImages(): int
    {
        return Poem::whereNotNull('image')->count();
    }
}