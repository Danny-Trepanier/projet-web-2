<div>
	<form action="{{ route('bottle.create.comment') }}" method="POST">
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