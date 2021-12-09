<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\ResearchText;

class Research extends Component
{

    public $name;
    public $myCellars;
    public $allBottles = [];

    public function mount($myCellars)
    {
    //     // dd(ResearchText::searchByName($myCellars, 'cRi'));
    //     // dd(ResearchText::searchByColor($myCellars, 'roUge'));
        $this->allBottles = $myCellars;
        // $this->allBottles = ResearchText::searchByName("alb", $myCellars);
    }

    public function updatedName($value, $myCellars)
    {
        // dd($value);
        $this->allBottles = ResearchText::searchByName($value, $myCellars);
        // $this->allBottles = $value;
        // dd($this->allBottles);
    }

    public function render()
    {
        return view('livewire.research', [
            'allBottles' => $this->allBottles,
        ]);
    }
}
