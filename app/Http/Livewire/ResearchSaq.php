<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

// Tutoriel youtube https://www.youtube.com/watch?v=QfZgqYV5pac

class ResearchSaq extends Component
{

    public $name;
    public $bottles;
    public $comments;
    public $allBottlesSaq = [];

    public function updatedName($value)
    {
        if ($value != "") {
            $this->allBottlesSaq = $this->searchByName($value);
        }
    }

    public function searchByName(string $name): array
    {
        return collect($this->bottles)
            ->filter(fn($object) => Str::contains(strtolower($object['name']), strtolower($name)))
            ->all();
    }

    public function render()
    {
        return view('livewire.research-saq');
    }
}
