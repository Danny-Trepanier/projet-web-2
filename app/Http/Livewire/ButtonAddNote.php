<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonAddNote extends Component
{
	public $bottle;

	public function mount($bottle)
	{
		$this->bottle = $bottle;
	}

	public function showNoteModal()
	{
		$this->emit(event: 'showNoteModal');
	}

    public function render()
    {
        return view('livewire.button-add-note');
    }
}
