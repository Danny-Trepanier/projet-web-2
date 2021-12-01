<x-app-layout>

    <x-slot name="header">
        <h1>{{ __('messages.cellar_edit_title') }}</h1>
    </x-slot>

    <div class="cellar--edit">

        <form action="" method="POST">
            @csrf
            @method('PUT')

            <fieldset>
                <div>
                    <label for="exampleInputEmail1">{{ __('messages.cellar_edit_label_for_name') }}</label>
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
                    <button type="submit" class="button">{{ __('messages.cellar_edit_button_update') }}</button>
                </div>
            </fieldset>

        </form>

    </div>

</x-app-layout>
