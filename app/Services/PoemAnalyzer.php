<?php

namespace App\Services;

class PoemAnalyzer
{
    private string $body;

    public function __construct(string $body)
    {
        $this->body = $body;
    }

    public function wordCount(): int
    {
        return str_word_count($this->body);
    }

    public function lengthType(): string
    {
        $words = $this->wordCount();

        if ($words < 20) {
            return 'Short Poem';
        }

        if ($words <= 60) {
            return 'Medium Poem';
        }

        return 'Long Poem';
    }

    public function qualityMessage(): string
    {
        $words = $this->wordCount();

        if ($words < 10) {
            return 'This poem is very short. Try adding more emotion or details.';
        }

        if ($words <= 50) {
            return 'This poem has a nice readable length.';
        }

        return 'This poem is detailed and expressive.';
    }

    public function analyze(): array
    {
        return [
            'word_count' => $this->wordCount(),
            'length_type' => $this->lengthType(),
            'quality_message' => $this->qualityMessage(),
        ];
    }
}