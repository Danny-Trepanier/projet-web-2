<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;	
use Livewire\Component;
use Illuminate\Http\Request;



class BottleQtyModal extends Component
{
	public $show;
	public $bottle;
	public $myCellars;
	public $nbBottle;

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

	public function addBottle($cellarID, $bottleID)
	{
		DB::table('bottle_cellar')
			->insert([
				'bottle_id' => $bottleID,
				'cellar_id' => $cellarID
			]);

		$this->emit(event: 'qtyChange'); 
	}

	public function substractBottle($cellarID, $bottleID)
	{
		DB::table('bottle_cellar')
			->where('bottle_id','=', $bottleID)
			->where('cellar_id','=', $cellarID)
			->limit(1)
			->delete();

		$this->emit(event: 'qtyChange'); 
	}

	public function countBottlesTotalPerId($cellarID, $bottleID)
	{
		$totalCount = DB::table('bottle_cellar')
						->select(DB::raw('count(bottle_id)'))
						->where('bottle_id','=', $bottleID)
						->where('cellar_id','=', $cellarID)
						->groupBy('cellar_id')
						->get();

		$this->nbBottle = (int) filter_var($totalCount, FILTER_SANITIZE_NUMBER_INT);
		return $this->nbBottle;
	}

    public function render()
    {	
        return view('livewire.bottle-qty-modal', [
		
		]);
    }

}
