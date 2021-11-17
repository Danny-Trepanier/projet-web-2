<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p>Nom de la bouteille: {{ $bottle->name }}</p>
                <p>Vin {{ $bottle->color }}</p>
                <p>Quantité en ml: {{ $bottle->ml_quantity }}</p>
                <p>Pays: {{ $bottle->country }}</p>
                <p>Code: {{ $bottle->code }}</p>
                <p>Prix: {{ $bottle->price }} $</p>
                <p>Image: <img src="/storage/{{ $bottle->image_link }}" alt="{{ $bottle->name }}"></p>
            </div>
        </div>
    </div>
</x-app-layout>
