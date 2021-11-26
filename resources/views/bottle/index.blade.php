<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

	<section class="filters">
		<div class="filters--wrap">
			<div class="filters--button">
				<span>A-Z</span>
			</div>
			<div class="filters--button">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 30" x="0px" y="0px"><g data-name="Layer 2"><path d="M5,14.55a12.15,12.15,0,0,0,7.24.42,10.14,10.14,0,0,1,7,.77l1.76.88V4.38l-.86-.43A12.16,12.16,0,0,0,11.76,3a10.15,10.15,0,0,1-7-.77L3,1.38V22H5Zm0-10A12.15,12.15,0,0,0,12.24,5,10.14,10.14,0,0,1,19,5.62v7.83A12.15,12.15,0,0,0,11.76,13,10.16,10.16,0,0,1,5,12.38Z"/></g></svg>
			</div>
			<div class="filters--button">

			</div>
			<div class="filters--button">
			<span>$</span>
			</div>
			<div class="filters--button">
				<svg xmlns="http://www.w3.org/2000/svg" width="33" height="31" viewBox="0 0 51 48">
				<title>Five Pointed Star</title>
				<path fill="none" stroke="#000" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
				</svg>
			</div>
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