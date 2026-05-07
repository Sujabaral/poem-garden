<?php

namespace App\Console\Commands;

use App\Models\Poem;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;

#[Signature('app:poem-stats-command')]
#[Description('Show Poem Garden statistics')]
class PoemStatsCommand extends Command implements Isolatable
{
    public function handle()
    {
        $totalPoems = Poem::count();
        $poemsWithImages = Poem::whereNotNull('image')->count();

        $this->info('Poem Garden Statistics');
        $this->info("Total Poems: {$totalPoems}");
        $this->info("Poems with Images: {$poemsWithImages}");

        return 0;
    }
}