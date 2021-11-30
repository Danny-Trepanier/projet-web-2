<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

	<article class="bottle-detail">

		<div class=img-wrap>
			<img src="{{ $bottle->image_link }}" alt="{{ $bottle->name }}">
		</div>

<!-- Déploiement de l'icone de couleur selon les infos de la bouteille  -->
@if($bottle->color == 'rouge')
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.85 83.91"><defs><style>.cls-1{fill:#9b0e27;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M42.91,0A42.91,42.91,0,0,0,28.65,83.38,9.21,9.21,0,0,0,40.4,77.74a9.44,9.44,0,0,0,.52-2.63V60.68C28.23,59.45,19.77,46.61,23.53,34.21L28,19.55A3.53,3.53,0,0,1,31.35,17H54.5a3.5,3.5,0,0,1,3.37,2.51l4.46,14.66c3.76,12.4-4.73,25.24-17.4,26.47V75.12a9.21,9.21,0,0,0,9.64,8.78,9,9,0,0,0,2.71-.54A42.91,42.91,0,0,0,42.91,0Z"/><path class="cls-1" d="M56.33,50.16A16.87,16.87,0,0,0,59,36c-4.26,6.92-15.2,7-23.76,3.84a13.36,13.36,0,0,0-8.93-.29,16.9,16.9,0,0,0,3.2,10.62A16.29,16.29,0,0,0,42.3,57.07h1.15A16.36,16.36,0,0,0,56.33,50.16Z"/></g></g></svg>
@elseif($bottle->color == 'blanc')
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.85 83.91"><defs><style>.cls-1{fill:#ECE09D;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M42.91,0A42.91,42.91,0,0,0,28.65,83.38,9.21,9.21,0,0,0,40.4,77.74a9.44,9.44,0,0,0,.52-2.63V60.68C28.23,59.45,19.77,46.61,23.53,34.21L28,19.55A3.53,3.53,0,0,1,31.35,17H54.5a3.5,3.5,0,0,1,3.37,2.51l4.46,14.66c3.76,12.4-4.73,25.24-17.4,26.47V75.12a9.21,9.21,0,0,0,9.64,8.78,9,9,0,0,0,2.71-.54A42.91,42.91,0,0,0,42.91,0Z"/><path class="cls-1" d="M56.33,50.16A16.87,16.87,0,0,0,59,36c-4.26,6.92-15.2,7-23.76,3.84a13.36,13.36,0,0,0-8.93-.29,16.9,16.9,0,0,0,3.2,10.62A16.29,16.29,0,0,0,42.3,57.07h1.15A16.36,16.36,0,0,0,56.33,50.16Z"/></g></g></svg>
@elseif($bottle->color == 'rosé')
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.85 83.91"><defs><style>.cls-1{fill:#FFB9B9;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M42.91,0A42.91,42.91,0,0,0,28.65,83.38,9.21,9.21,0,0,0,40.4,77.74a9.44,9.44,0,0,0,.52-2.63V60.68C28.23,59.45,19.77,46.61,23.53,34.21L28,19.55A3.53,3.53,0,0,1,31.35,17H54.5a3.5,3.5,0,0,1,3.37,2.51l4.46,14.66c3.76,12.4-4.73,25.24-17.4,26.47V75.12a9.21,9.21,0,0,0,9.64,8.78,9,9,0,0,0,2.71-.54A42.91,42.91,0,0,0,42.91,0Z"/><path class="cls-1" d="M56.33,50.16A16.87,16.87,0,0,0,59,36c-4.26,6.92-15.2,7-23.76,3.84a13.36,13.36,0,0,0-8.93-.29,16.9,16.9,0,0,0,3.2,10.62A16.29,16.29,0,0,0,42.3,57.07h1.15A16.36,16.36,0,0,0,56.33,50.16Z"/></g></g></svg>
@endif
		<div class="bg--color wrap--quantity">
				<p>Nb au cellier:</p>
				<p class="number--quantity">X</p>
		</div>


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

		<section class="detail--info">
			<h1>{{ $bottle->name }}</h1>
			<div class="bg--color container--info">
				<div>
					<span>{{ $bottle->country }}</span>
					<span>{{ $bottle->ml_quantity }}</span>
				</div>
				<div>
					<span>Code SAQ: {{ $bottle->code }}</span>
					<span>{{ $bottle->price }} $</span>
				</div>
			</div>
		</section>
		<button class="button">
		<svg width="28px" height="28px" viewBox="0 0 200 200" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><title/><path d="M100,15a85,85,0,1,0,85,85A84.93,84.93,0,0,0,100,15Zm0,150a65,65,0,1,1,65-65A64.87,64.87,0,0,1,100,165ZM116.5,57.5a9.67,9.67,0,0,0-14,0L74,86a19.92,19.92,0,0,0,0,28.5L102.5,143a9.9,9.9,0,0,0,14-14l-28-29L117,71.5C120.5,68,120.5,61.5,116.5,57.5Z"/></svg>
			Liste
		</button>
		

	</article>





</x-app-layout>
