<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\ResearchText;

class Research extends Component
{

    public $text;
    public $myCellars;

    public function mount($myCellars)
    {
        // dd(ResearchText::searchByText($myBottles, 'bor'));
        // dd($myBottles);
    }

    public function render()
    {
        return view('livewire.research');
    }
}
