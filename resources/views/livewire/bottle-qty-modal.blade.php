@if($show == true)
<div class="modal--fullscreen">
	<div class="modal-content">
			<h1>{{$bottle->name}}</h1>
			@forelse($myCellars as $cellar)
			<div>
				<h2>{{$cellar->name}}</h2>
					{{$this->countBottlesTotalPerId($cellar->id, $bottle->id)}}
				<button wire:click="addBottle({{$cellar->id}}, {{$bottle->id}})">+</button>
				<button wire:click="substractBottle({{$cellar->id}}, {{$bottle->id}})">-</button>
			</div>
			@empty
			<p>{{ __('messages.bottle_show_no_cellar_text') }}</p>
			@endforelse

			<button wire:click="closeModal">X</button>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif
