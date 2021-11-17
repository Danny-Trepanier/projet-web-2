<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Nom du user: {{ $cellar->user->name }}</p>

                <p>Nom du cellier: {{ $cellar->name }}</p>

                <p>Dans mon cellier, il y a:</p>
                <ul>
                    @forelse ($myCellars->bottles as $myBottle)
                    <li>{{ $myBottle->name }}</li>
                    @empty
                    <p>Vous possèdez aucune bouteille dans ce cellier.</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
