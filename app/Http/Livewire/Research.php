<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\ResearchText;

class Research extends Component
{

    public $name;
    public $myCellars;
    public $allBottles = [];

    public function updatedName($value)
    {
        if ($value != "") {
            $this->allBottles = ResearchText::searchByName($value, $this->myCellars);
        }
        else {
            $this->allBottles = collect($this->myCellars);
        }
    }

    public function render()
    {
        return view('livewire.research');
    }
}
