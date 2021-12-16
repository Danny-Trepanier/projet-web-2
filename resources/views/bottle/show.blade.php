<x-app-layout>
    <x-slot name="header">
<!--         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.bottle_show_title') }}
        </h2> -->
    </x-slot>

	<article class="bottle-detail">

		<div class=img-wrap>
			<img src="{{ $bottle->image_link }}" alt="{{ $bottle->name }}">
		</div>

<!-- Déploiement de l'icone de couleur selon les infos de la bouteille  -->

		<svg class="icon-{{$bottle->color}}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 85.85 83.91"><defs></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M42.91,0A42.91,42.91,0,0,0,28.65,83.38,9.21,9.21,0,0,0,40.4,77.74a9.44,9.44,0,0,0,.52-2.63V60.68C28.23,59.45,19.77,46.61,23.53,34.21L28,19.55A3.53,3.53,0,0,1,31.35,17H54.5a3.5,3.5,0,0,1,3.37,2.51l4.46,14.66c3.76,12.4-4.73,25.24-17.4,26.47V75.12a9.21,9.21,0,0,0,9.64,8.78,9,9,0,0,0,2.71-.54A42.91,42.91,0,0,0,42.91,0Z"/><path class="cls-1" d="M56.33,50.16A16.87,16.87,0,0,0,59,36c-4.26,6.92-15.2,7-23.76,3.84a13.36,13.36,0,0,0-8.93-.29,16.9,16.9,0,0,0,3.2,10.62A16.29,16.29,0,0,0,42.3,57.07h1.15A16.36,16.36,0,0,0,56.33,50.16Z" /></g></g></svg>

		@livewire('button-add-bottle', ['bottle' => $bottle])

		@livewire('button-add-note', ['bottle' => $bottle])

		<section class="detail--info">
			<h1>{{ $bottle->name }}</h1>
			<div class="bg--color container--info">
				<div>
					<span>{{ $bottle->country }}</span>
					<span>{{ $bottle->ml_quantity }}</span>
				</div>
				<div>
					<span>{{ __('messages.bottle_show_code_saq_text') }} {{ $bottle->code }}</span>
					<span>{{ $bottle->price }} $</span>
				</div>
			</div>
		</section>
		<a href="{{ url()->previous() }}">
			<button class="link--back">
						{{ __('messages.bottle_show_return_button') }}
			</button>
		</a>

	</article>


	@livewire('bottle-qty-modal', ['bottle' => $bottle, 'myCellars' => $myCellars])
	@livewire('note-modal', ['bottle' => $bottle])

</x-app-layout>
