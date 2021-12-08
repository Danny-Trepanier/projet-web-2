<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ButtonAddBottle extends Component
{

	public $quantity = 0;

	public function mount() 
	{

	}

	public function showModal()
	{
		$this->emit(event: 'showModal');
	}

    public function render()
    {
        return view('livewire.button-add-bottle');
    }

	public function add() 
	{
		
		$this->quantity++;
	}

	public function substract() 
	{

	}
}
