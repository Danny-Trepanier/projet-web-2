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

	public function mount($bottle)
	{
		$this->bottle = $bottle;
	}

	public function showNoteModal()
	{
		$this->emit(event: 'showNoteModal');
	}

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

    public function render()
    {
		$this->getNote();
        return view('livewire.button-add-note');
    }
}
