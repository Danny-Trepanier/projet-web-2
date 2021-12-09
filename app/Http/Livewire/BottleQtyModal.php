<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BottleQtyModal extends Component
{
	public $show;
	public $bottle;
	public $myCellars;

	protected $listeners = ['showModal' => 'showModal'];

	public function mount($bottle, $myCellars)
	{
		$this->bottle = $bottle;
		$this->myCellars = $myCellars;
	}

	public function showModal()
	{
		$this->show = true;
	}

	public function closeModal()
	{
		$this->show = false;
	}

	public function addBottle()
	{

	}

	public function substractBottle()
	{
		
	}

    public function render()
    {	
        return view('livewire.bottle-qty-modal');
    }
}
