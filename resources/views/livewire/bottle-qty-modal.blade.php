@if($show == true)
<div class="modal--fullscreen">
	<div class="modal-content">


	<button wire:click="closeModal">X</button>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif