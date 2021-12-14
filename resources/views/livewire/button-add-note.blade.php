<div class="note--wrap">
	<button class="note--number" wire:click="showNoteModal">
		<span>{{ $bottle->comment->note ?? '/' }}</span>
	
@if($bottle->comment)
	@for ($i = 0; $i < $bottle->comment->note; $i++)
		<svg class="icon--star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 225"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M120,0l30,85h90l-70,55,25,85-75-50L45,225l25-85L0,85H90Z"/></g></g></svg>
	@endfor

	@else
		<svg class="icon--star-empty" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 225"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M120,0l30,85h90l-70,55,25,85-75-50L45,225l25-85L0,85H90Z"/></g></g></svg>
	</button>
@endif
</div>