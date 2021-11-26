<x-app-layout>

    <x-slot name="header">
        <h1>Update Cellar</h1>
    </x-slot>

    <div class="cellar--edit">

        <h2>Update the name of the cellar</h2>

        <form action="" method="POST">
            @csrf
            @method('PUT')

            <fieldset>
                <div>
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$cellar->name}}">
                </div>
                <div>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div>
                    <button type="submit" class="button">Update</button>
                </div>
            </fieldset>

        </form>

    </div>

</x-app-layout>
