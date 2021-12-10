<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ButtonAddBottle extends Component
{

	public $quantity;

	public function mount() 
	{

	}

	public function showModal()
	{
		$this->emit(event: 'showModal');
	}

	public function getNbBottles($bottleID)
	{
		$totalCount = DB::table('bottle_cellar')
					->join('cellars', 'cellars.user_id', '=', Auth::user()->id)
					->select(DB::raw('count(bottle_id)'))
					->where('bottle_id','=', $bottleID)
					->groupBy('bottle_id')
					->get();

		$this->quanity = (int) filter_var($totalCount, FILTER_SANITIZE_NUMBER_INT);

		return $this->quantity;

	}

	public function render()
    {
        return view('livewire.button-add-bottle');
    }

}
