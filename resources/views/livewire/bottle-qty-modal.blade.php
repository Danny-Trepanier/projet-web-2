@if($show == true)
<div class="modal--fullscreen">
	<div class="modal-content">
			<h1>{{$bottle->name}}</h1>
			@forelse($myCellars as $cellar)
			<div>
				<h2>{{$cellar->name}}</h2>
					{{$this->countBottlesTotalPerId($cellar->id, $bottle->id)}}
					{{$nbBottle}}
				<button wire:click.prevent>+</button>
				<button wire:click.prevent>-</button>
			</div>
			@empty
			<p>Vous n'avez aucun cellier</p>
			@endforelse

			<button wire:click="closeModal">X</button>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif