<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BottleQtyModal extends Component
{
	public $show;

	protected $listeners = ['showModal' => 'showModal'];

	public function mount()
	{

	}

	public function showModal()
	{
		$this->show = true;
	}

	public function closeModal()
	{
		$this->show = false;
	}

    public function render()
    {	
        return view('livewire.bottle-qty-modal');
    }
}
