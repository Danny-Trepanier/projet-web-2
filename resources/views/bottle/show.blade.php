<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
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

                <div class="form-floating mt-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">Noter la bouteille</button>
                </div>
            </fieldset>
        </form>
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
