<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ButtonAddBottle extends Component
{

	public $quantity;
	public $bottle;

	protected $listeners = ['qtyChange' => 'getNbBottles'];

	public function mount($bottle) 
	{
		$this->bottle = $bottle;
	}

	public function showModal()
	{
		$this->emit(event: 'showModal');
	}

	public function getNbBottles()
	{
		$totalCount = DB::table('bottle_cellar')
					->join('cellars', 'bottle_cellar.cellar_id', '=', 'cellars.id')
					->select(DB::raw('count(bottle_id)'))
					->where('cellars.user_id','=', Auth::user()->id)
					->where('bottle_cellar.bottle_id', '=',$this->bottle->id)
					->groupBy('bottle_cellar.bottle_id')
					->get();

		$totalCount = (int) filter_var($totalCount, FILTER_SANITIZE_NUMBER_INT);
		$this->quantity = $totalCount;
		return $this->quantity;
	}

	public function render()
    {	$this->getNbBottles();
		
        return view('livewire.button-add-bottle');
    }

}
