<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ url("") }}/cellar/create/cellar">Créer un cellier</a>
                @forelse ($cellars as $cellar)
                <a href="{{ url("") }}/cellar/{{ $cellar->id }}">{{ $cellar->name }}</a>
                <a href="{{ url("") }}/cellar/{{ $cellar->id }}/edit">Modifier</a>
                @empty
                <p>Vous possèdez aucun cellier pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
