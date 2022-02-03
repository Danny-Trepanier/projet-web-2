<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;



class BottleQtyModal extends Component
{
	public $showQty;
	public $bottle;
	public $myCellars;
	public $nbBottle;

	protected $listeners = ['showQtyModal' => 'showQtyModal'];

	/**
	 * Mount les infos passé au composant pour les utiliser publiquement
	 */
	public function mount($bottle, $myCellars)
	{
		$this->bottle = $bottle;
		$this->myCellars = $myCellars;
	}

	/**
	 * Envoi l'évènement d'ouverture de la fênetre vers le composant de la modale
	 */
	public function showQtyModal()
	{
		$this->showQty = true;
	}

	/**
	 * Envoi l'évènement de fermeture de la fênetre vers le composant de la modale
	 */
	public function closeQtyModal()
	{
		$this->showQty = false;
	}

	/**
	 * Modification de la table "bottle_cellar" pour ajouter une bouteille
	 * @param cellarID // identifiant du cellier concerné
	 * @param bottleID // identifiant de la bouteille concernée
	 * Émet l'évènement du changement de quantité pour le réaffichage
	 */
	public function addBottle($cellarID, $bottleID)
	{
		DB::table('bottle_cellar')
			->insert([
				'bottle_id' => $bottleID,
				'cellar_id' => $cellarID
			]);

		$this->emit(event: 'qtyChange'); 
	}

	/**
	 * Modification de la table "bottle_cellar" pour supprimer une bouteille
	 * @param cellarID // identifiant du cellier concerné
	 * @param bottleID // identifiant de la bouteille concernée
	 * Émet l'évènement du changement de quantité pour le réaffichage
	 */
	public function substractBottle($cellarID, $bottleID)
	{
		DB::table('bottle_cellar')
			->where('bottle_id','=', $bottleID)
			->where('cellar_id','=', $cellarID)
			->limit(1)
			->delete();

		$this->emit(event: 'qtyChange'); 
	}

	/**
	 * Compte le nombre d'instance d'une bouteille dans un cellier
	 * @param cellarID // identifiant du cellier concerné
	 * @param bottleID // identifiant de la bouteille concernée
	 * @return nbBottle // nb de bouteille à afficher par cellier
	 */
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
