<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NoteModal extends Component
{
	public $bottle;
	public $note;
	public $showNote;

	protected $listeners = ['showNoteModal' => 'showNoteModal'];

	/**
	 * Mount les info passées au composant pour pouvoir
	 * être public
	 * @param $bottle
	 */
	public function mount($bottle)
	{
		$this->bottle = $bottle;
	}
	
	/**
	 * Affiche la modale de la note au clic
	 */
	public function showNoteModal()
	{
		$this->showNote = true;
	}

	/**
	 * Ferme la fenêtre modale de la note
	 */
	public function closeNoteModal()
	{
		$this->showNote = false;
	}


	/**
     * Ajoute une note à une bouteille de vin.
	 * Après validation, met la base de données à jour.
	 * Envoi l'évènemement noteChange pour l'affichage
	 * Ferme la modale
     *
     * @param $bottleID
	 * @param $note
     */
    public function storeComment($bottleID, $note)
    {
		if($note >= '1' && $note <= '5' ) {
		DB::table('comments')
			->updateOrInsert(
			[
				'bottle_id' => $bottleID,
				'user_id' => Auth::user()->id,
			],
			[
				'note' => $note,
			]
			);
		$this->emit(event: 'noteChange');
		}
		$this->closeNoteModal();
    }

	/**
	 * Affichage de la note modale
	 * @return
	 */
	public function render()
    {
        return view('livewire.note-modal');
    }


}
