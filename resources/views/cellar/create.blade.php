<x-app-layout>

    <x-slot name="header">
        <h1>Create Cellar</h1>
    </x-slot>

    <div class="cellar--create">

        <h2>Creation of a cellar</h2>

        <form action="" method="POST">
            @csrf

            <fieldset>
                <div>
                    <label for="exampleInputEmail1">Cellar name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div>
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
                <div>
                    <button type="submit" class="button">Create</button>
                </div>
            </fieldset>

        </form>

    </div>

</x-app-layout>
