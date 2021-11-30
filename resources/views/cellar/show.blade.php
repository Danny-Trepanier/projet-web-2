<x-app-layout>

    <x-slot name="header">
        <h1>{{ $cellar->name }}</h1>
    </x-slot>

        <div>
            <p>Nom du user: {{ $cellar->user->name }}</p>

            <p>Dans mon cellier, il y a:</p>
            <ul>
                @forelse ($myCellars->bottles as $myBottle)
                    <li>{{ $myBottle->name }}</li>
                @empty
                    <p>Vous possèdez aucune bouteille dans ce cellier.</p>
                @endforelse
            </ul>
        </div>

</x-app-layout>
