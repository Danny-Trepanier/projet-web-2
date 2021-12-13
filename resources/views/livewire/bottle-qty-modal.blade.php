@if($show == true)
<div class="modal--fullscreen">
	<div class="modal-content">
			<h1>{{$bottle->name}}</h1>
			@forelse($myCellars as $cellar)
			<div class="cellar--wrap">
				<h2>{{$cellar->name}}</h2>
				<div class="cellar--actions">
					<button wire:click="substractBottle({{$cellar->id}}, {{$bottle->id}})">-</button>
					<span>{{$this->countBottlesTotalPerId($cellar->id, $bottle->id)}}</span>
					<button wire:click="addBottle({{$cellar->id}}, {{$bottle->id}})">+</button>
				</div>
			</div>
			@empty
			<p>{{ __('messages.bottle_show_no_cellar_text') }}</p>
			@endforelse

			<button class="button-modal-close" wire:click="closeModal">X</button>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif
