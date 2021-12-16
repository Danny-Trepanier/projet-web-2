<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NoteModal extends Component
{
	public $bottle;
	public $note;
	public $showNote;

	protected $listeners = ['showNoteModal' => 'showNoteModal'];

	public function mount($bottle)
	{
		$this->bottle = $bottle;
	}
	
	public function showNoteModal()
	{
		$this->showNote = true;
	}

	public function closeNoteModal()
	{
		$this->showNote = false;
	}


	/**
     * Ajoute une note à une bouteille de vin.
     *
     * @param  
     * @return 
     */

    public function storeComment($bottleID, $note)
    {
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
		$this->closeNoteModal();

    }

	public function render()
    {
        return view('livewire.note-modal');
    }


}
