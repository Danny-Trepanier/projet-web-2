<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteModal extends Component
{
	public Bottle $bottle;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeComment(Request $bottlePost)
    {
        $bottlePost->validate([
            'note' => 'required|min:1|max:5',
        ]);

        $bottle = Comment::updateOrCreate(
            [
                'bottle_id' => $bottlePost->bottle_id,
                'user_id' => Auth::user()->id,
            ],
            [
                'note' => $bottlePost->note,
            ]
        );
    }

	public function render()
    {
        return view('livewire.note-modal');
    }


}
