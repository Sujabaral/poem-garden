<?php

use App\Support\PoemReporter;
use Illuminate\Support\Facades\Artisan;

Artisan::command('poems:report', function (PoemReporter $reporter) {
    $totalPoems = $reporter->totalPoems();
    $poemsWithImages = $reporter->poemsWithImages();

    $this->info('Poem Garden Report');
    $this->info("Total Poems: {$totalPoems}");
    $this->info("Poems with Images: {$poemsWithImages}");
})->purpose('Show Poem Garden poem statistics');