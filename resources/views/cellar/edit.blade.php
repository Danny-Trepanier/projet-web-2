<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Modification du cellier</h1>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label mt-4">Nom</label>
                            <input type="text" class="form-control" name="name" value="{{$cellar->name}}">
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
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
