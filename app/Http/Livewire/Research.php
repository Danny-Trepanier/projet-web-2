<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Service\ResearchText;

class Research extends Component
{

    public $text;

    public function mount()
    {
        // dd(ResearchText::searchByText('bor'));
    }

    public function render()
    {
        return view('livewire.research');
    }
}
