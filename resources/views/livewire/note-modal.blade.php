@if($showNote == true)
<div class="modal--fullscreen">
	<div class="modal-note-content">
			<fieldset class="wrap--btn-note">

				<div>
					<label for="note">1</label>
					<input wire:model="note" type="radio" name="note" value="1">
				</div>
				<div>
					<label for="note">2</label>
					<input wire:model="note" type="radio" name="note" value="2">	
				</div>
				<div>
					<label for="note">3</label>
					<input wire:model="note" type="radio" name="note" value="3">
				</div>
				<div>
					<label for="note">4</label>
					<input wire:model="note" type="radio" name="note" value="4">
				</div>
				<div>
					<label for="note">5</label>
					<input wire:model="note" type="radio" name="note" value="5">
				</div>
	
				<button wire:click.prevent="storeComment( {{$bottle->id}}, {{ $note ?? 0 }})">✓</button>
				<button wire:click.prevent='closeNoteModal'>X</button>
			</fieldset>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif
