<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @forelse ($bottles as $bottle)

                <a href="{{ url("") }}/bottle/{{ $bottle->id }}">
					<article class="wine-card">
						<div class="wine-card--img-wrap">
							<img src="{{ $bottle->image_link }}?quality=80&fit=bounds&height=166&width=111&canvas=111:166 " alt="{{ $bottle->name }}">
						</div>
						<div>
							<h1>{{ $bottle->name }}</h1>
							<p>{{ $bottle->country }}</p>
							<p>{{ $bottle->price }}</p>
				@forelse($comments as $comment)
					@if($bottle->id == $comment->bottle_id)
							<p>{{ $comment->note }}</p>
						@else <p>0</p>
					@endif
					@empty
							<p>0</p>
				@endforelse
						</div>
					</article>
				</a>

                @empty
                <p>Il y a aucune bouteille dans la base de donnée.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
