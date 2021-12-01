<div class="modal--wrap" >
	<span>{{ $comment[0]->note ?? '/' }}</span>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240 225"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M120,0l30,85h90l-70,55,25,85-75-50L45,225l25-85L0,85H90Z"/></g></g></svg>

	<form class="modal-form form--hidden" action="{{ route('bottle.create.comment') }}" method="POST">
	@csrf
		<fieldset>
			<div class="form-group">
				<input name="bottle_id" type="hidden" value="{{ $bottle->id }}">
				<input class="form-check-input" type="radio" name="note" value="1">
				<label class="form-check-label" for="note">1</label>
				<input class="form-check-input" type="radio" name="note" value="2">
				<label class="form-check-label" for="note">2</label>
				<input class="form-check-input" type="radio" name="note" value="3">
				<label class="form-check-label" for="note">3</label>
				<input class="form-check-input" type="radio" name="note" value="4">
				<label class="form-check-label" for="note">4</label>
				<input class="form-check-input" type="radio" name="note" value="5">
				<label class="form-check-label" for="note">5</label>
			</div>

			<div>
				<button type="submit" class="btn btn-primary">Note</button>
			</div>
		</fieldset>
	</form>
	
</div>

