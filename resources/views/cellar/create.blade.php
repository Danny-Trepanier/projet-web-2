<x-app-layout>

    <x-slot name="header">
        <h1>{{ __('messages.cellar_create_title') }}</h1>
    </x-slot>

    <div class="cellar--create">

        <form action="" method="POST">
            @csrf

            <fieldset>
                <div>
                    <label for="exampleInputEmail1">{{ __('messages.cellar_create_label_for_name') }}</label>
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
                    <button type="submit" class="button">{{ __('messages.cellar_create_button_create') }}</button>
                </div>
            </fieldset>

        </form>

    </div>

</x-app-layout>
