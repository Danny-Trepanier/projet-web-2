@if($show == true)
<div class="modal--fullscreen">
	<div class="modal-content">
		<form action="">
			<h1>{{$bottle->name}}</h1>
			@forelse($myCellars as $cellar)
				<p>{{count($cellar->bottles)}}</p>
			<div>
				<h2>{{$cellar->name}}</h2>

				<button wire:click.prevent>+</button>
				<button wire:click.prevent>-</button>
			</div>
			@empty
			<p>Vous n'avez aucun cellier</p>
			@endforelse

			<button wire:click="closeModal">X</button>
		</form>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif