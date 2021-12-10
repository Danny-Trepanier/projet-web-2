<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Service\ResearchText;

// Tutoriel youtube https://www.youtube.com/watch?v=QfZgqYV5pac

class Research extends Component
{

    public $name;
    public $myCellars;
    public $allBottles = [];

    public function updatedName($value)
    {
        if ($value != "") {
            $this->allBottles = $this->searchByName($value);
        }
        else {
            // dd($this->myCellars);
        }
    }

    public function searchByName(string $name): array
    {
        return collect($this->myCellars)
            ->filter(fn($object) => Str::contains(strtolower($object['name']), strtolower($name)))
            ->all();
    }

    public function render()
    {
        return view('livewire.research');
    }
}
