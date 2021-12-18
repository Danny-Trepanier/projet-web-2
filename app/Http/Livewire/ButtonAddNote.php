<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ButtonAddNote extends Component
{
	public $bottle;
	public $note;

	protected $listeners = ['noteChange' => 'getNote'];

	/**
	 * Mount les info passés en paramete pour être utilisé
	 * de manière publique
	 */
	public function mount($bottle)
	{
		$this->bottle = $bottle;
	}

	/**
	 * Envoi l'évènement d'affichage de la note
	 * vers le composant de la fenetre modale
	 */
	public function showNoteModal()
	{
		$this->emit(event: 'showNoteModal');
	}

	/**
	 * Va chercher la note qu'un utilisateur a laissé pour une bouteille donnée
	 * Recharge le composant pour que la note s'affiche
	 * @return $this->note // note public qui se met à jour au changement
	 */
	public function getNote()
	{
		$currentNote = DB::table('comments')
						->select('note')
						->where('bottle_id', '=', $this->bottle->id)
						->where('user_id', '=', Auth::user()->id)
						->get();
		$currentNote = (int) filter_var($currentNote, FILTER_SANITIZE_NUMBER_INT);
		$this->note = $currentNote;
		return $this->note;

		$this->render();
	}

	/**
	 * Affichage du composant
	 */
    public function render()
    {
		$this->getNote();
        return view('livewire.button-add-note');
    }
}
