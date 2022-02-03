<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Création d'une bouteille</h1>
                <form action="" method="POST">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Nom de la bouteille</label>
                            <input type="text" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Couleur</label>
                            <select name="color">
                                <option value="Rouge">Rouge</option>
                                <option value="Blanc">Blanc</option>
                                <option value="Rosé">Rosé</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Quantité en ml/L</label>
                            <input type="text" class="form-control" name="ml_quantity">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Pays</label>
                            <select name="country">
                                <option value="Canada">Canada</option>
                                <option value="États-Unis">États-Unis</option>
                                <option value="Portugal">Portugal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Prix</label>
                            <input type="number" min="0.00" max="10000.00" step="0.01" name="price"/>

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
                            <button type="submit" class="btn btn-primary">Créer la bouteille</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
