<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bottle;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteModal extends Component
{
	public $bottle;

	public function mount($bottle)
	{
		$this->bottle = $bottle;
	}


    public function render()
    {
        return view('livewire.note-modal', [
			
		]);
    }

	/**
     * Ajoute une note à une bière.
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

        return view('livewire.note-modal');
    }

}
