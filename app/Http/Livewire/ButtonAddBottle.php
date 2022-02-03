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

	/**
	 * Mount les info passé au composant pour etre utilisé publiquement
	 */
	public function mount($bottle) 
	{
		$this->bottle = $bottle;
	}

	/**
	 * Envoi l'évènement d'ouverture de la modale vers le composant de la fenetre
	 */
	public function showQtyModal()
	{
		$this->emit(event: 'showQtyModal');
	}

	/**
	 * Va chercher le nb total de cette bouteilles dans tous les cellier de l'usager.
	 * @return $this->quantity // le nb total de cette bouteille
	 */
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

	/**
	 * Affichage du composant
	*/
	public function render()
    {	$this->getNbBottles();
		
        return view('livewire.button-add-bottle');
    }

}
