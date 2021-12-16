<div class="note--wrap">
	<button class="note--number" wire:click="showNoteModal">
		<span>{{ $note ?? '/' }}</span>
	
@if($note)
	@for ($i = 0; $i < $note; $i++)

	<img class="icon--star" src="{{asset('img/icon/icon_etoile_rouge.png')}}" alt="red star note">
	@endfor

	@else
	<img class="icon--star" src="{{asset('img/icon/icon_etoile_vide.png')}}" alt="empty star note">
	</button>
@endif
</div>