<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;	
use Livewire\Component;
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

	public function countBottlesTotalPerId($cellarID, $bottleID)
	{
		$totalCount = DB::table('bottle_cellar')
						->select(DB::raw('count(bottle_id)'))
						->where('bottle_id','=', $bottleID)
						->where('cellar_id','=', $cellarID)
						->groupBy('cellar_id')
						->get();

		echo (int) filter_var($totalCount, FILTER_SANITIZE_NUMBER_INT);
	}

    public function render()
    {	
        return view('livewire.bottle-qty-modal', [
		
		]);
    }

}
