<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

	<section class="filters">
		<div class="filters--wrap">
			<div class="filters--button"></div>
			<div class="filters--button"></div>
			<div class="filters--button"></div>
			<div class="filters--button"></div>
			<div class="filters--button"></div>
		</div>
		<div class="filters--search-bar">
			<input type="text" placeholder="Nom, Pays, Couleur, Prix... ">
		</div>
	</section>

@forelse ($bottles as $bottle)
	<a href="{{ url("") }}/bottle/{{ $bottle->id }}">
		<article class="wine-card">
			<div class="img-wrap">
				<img src="{{ $bottle->image_link }}?quality=80&fit=bounds&height=166&width=111&canvas=111:166 " alt="{{ $bottle->name }}">
			</div>
			<div class="info-wrap">
				<div class="info--text">
					<h1>{{ $bottle->name }}</h1>
					<div>
						<p>{{ $bottle->country }}</p>
						<p>{{ $bottle->price }}$</p>
					</div>
				</div>
				<div class="info--icons">
					
<!-- Déploiement de l'icone de couleur selon les infos de la bouteille  -->
		@if($bottle->color == 'rouge')
					<img src="{{ asset('img/icon/icone_vin_rouge.png') }}" alt="icone vin rouge">
		@elseif($bottle->color == 'blanc')
					<img src="{{ asset('img/icon/icone_vin_blanc.png') }}" alt="icone vin rouge">
		@elseif($bottle->color == 'rosé')
					<img src="{{ asset('img/icon/icone_vin_rose.png') }}" alt="icone vin rouge">
		@endif

<!-- Affichage de la note laissée par l'usager sur la bouteille -->
		@forelse($comments as $comment)
			@if($bottle->id == $comment->bottle_id)
					<div>
						<span>{{ $comment->note }}</span> 
						<img src="{{ asset('img/icon/icon_etoile_rouge.png') }}" alt="icone etoile note">

					</div>

		@else 
					<p>/
					</p>
			@endif
		@empty
					<p>/
					</p>
		@endforelse

				</div>
			</div>
		</article>
	</a>

	@empty
	<p>Il y a aucune bouteille dans la base de donnée.</p>
	@endforelse

</x-app-layout>