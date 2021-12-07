<x-app-layout>

	<div class="title">
        <h1>{{ __('messages.bottle_index_title') }}</h1>
    </div>

	<section class="filters">
		<div class="filters--wrap">
			<div class="filters--button">
				<span>A-Z</span>
			</div>
			<div class="filters--button">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 30" x="0px" y="0px" class="flag"><g data-name="Layer 2"><path d="M5,14.55a12.15,12.15,0,0,0,7.24.42,10.14,10.14,0,0,1,7,.77l1.76.88V4.38l-.86-.43A12.16,12.16,0,0,0,11.76,3a10.15,10.15,0,0,1-7-.77L3,1.38V22H5Zm0-10A12.15,12.15,0,0,0,12.24,5,10.14,10.14,0,0,1,19,5.62v7.83A12.15,12.15,0,0,0,11.76,13,10.16,10.16,0,0,1,5,12.38Z"/></g></svg>
			</div>
			<div class="filters--button">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.85 83.91" ><defs><style>.cls-1{fill:#161B1F;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M42.91,0A42.91,42.91,0,0,0,28.65,83.38,9.21,9.21,0,0,0,40.4,77.74a9.44,9.44,0,0,0,.52-2.63V60.68C28.23,59.45,19.77,46.61,23.53,34.21L28,19.55A3.53,3.53,0,0,1,31.35,17H54.5a3.5,3.5,0,0,1,3.37,2.51l4.46,14.66c3.76,12.4-4.73,25.24-17.4,26.47V75.12a9.21,9.21,0,0,0,9.64,8.78,9,9,0,0,0,2.71-.54A42.91,42.91,0,0,0,42.91,0Z"/><path class="cls-1" d="M56.33,50.16A16.87,16.87,0,0,0,59,36c-4.26,6.92-15.2,7-23.76,3.84a13.36,13.36,0,0,0-8.93-.29,16.9,16.9,0,0,0,3.2,10.62A16.29,16.29,0,0,0,42.3,57.07h1.15A16.36,16.36,0,0,0,56.33,50.16Z"/></g></g></svg>
			</div>
			<div class="filters--button">
			<span>$</span>
			</div>
			<div class="filters--button">
				<svg xmlns="http://www.w3.org/2000/svg" width="33" height="31" viewBox="0 0 51 48">
				<path fill="#161B1F" stroke="#000" d="m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z"/>
				</svg>
			</div>
		</div>
		<div class="filters--search-bar">
			
			<input type="search" placeholder=" Nom, Pays, Couleur, Prix... " results="0">
		</div>
	</section>
	<section class="liste-wrap">
		@forelse ($bottles as $bottle)
			<a href="{{ url("") }}/bottle/{{ $bottle->id }}">
				<article class="wine-card">
					<div class="img-wrap">
						@if(filter_var($bottle->image_link, FILTER_VALIDATE_URL))
						<img src="{{ $bottle->image_link }}?quality=80&fit=bounds&height=166&width=111&canvas=111:166 " alt="{{ $bottle->name }}">
						@else
						<img src="{{ asset('storage/bouteille-default.png') }} " alt="{{ $bottle->name }}">
						@endif
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
								<span><b>{{ $comment->note }}</b></span>
								<img src="{{ asset('img/icon/icon_etoile_rouge.png') }}" alt="icone etoile note">
							</div>
		
							@else
		
							@endif
						@empty
							<div>
								<span><b>/</b></span>
								<img src="{{ asset('img/icon/icon_etoile_vide.png') }}" alt="icone etoile vide">
							</div>
				@endforelse
		
						</div>
					</div>
				</article>
			</a>
		
			@empty
			<p>Il y a aucune bouteille dans la base de donnée.</p>
			@endforelse
	</section>

</x-app-layout>