@if($showNote == true)
<div class="modal--fullscreen">
	<div class="modal-note-content">
		<form action="{{ route('bottle.create.comment') }}" method="POST">
		@csrf
			<fieldset class="wrap--btn-note">
					<input name="bottle_id" type="hidden" value="{{ $bottle->id }}">

					<div>
						<label for="note">1</label>
						<input type="radio" name="note" value="1">
					</div>
					<div>
						<label for="note">2</label>
						<input type="radio" name="note" value="2">	
					</div>
					<div>
						<label for="note">3</label>
						<input type="radio" name="note" value="3">
					</div>
					<div>
						<label for="note">4</label>
						<input type="radio" name="note" value="4">
					</div>
					<div>
						<label for="note">5</label>
						<input type="radio" name="note" value="5">
					</div>
		
					<button type="submit" class="btn btn-primary">Note</button>
			</fieldset>
		</form>
	</div>
</div>
@else
<div class="modal--closed"></div>
@endif
