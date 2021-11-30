<x-app-layout>

    <x-slot name="header">
        <h1>{{ __('messages.cellar_index_title') }}</h1>
    </x-slot>

        <div class="cellar--index">
            <div class="cellar--index-create">
                <a href="{{ url("") }}/cellar/create/cellar" class="cellar--index-link">{{ __('messages.cellar_index_link_create') }}</a>
            </div>
            @forelse ($cellars as $cellar)
                <div>
                    <h2 class="cellar--index-name">{{ $cellar->name }}</h2>
                    <a href="{{ url("") }}/cellar/{{ $cellar->id }}" class="cellar--index-link">{{ __('messages.cellar_index_link_see') }}</a>
                    <a href="{{ url("") }}/cellar/{{ $cellar->id }}/edit" class="cellar--index-link">{{ __('messages.cellar_index_link_update') }}</a>
                </div>
            @empty
                <div class="cellar--index-empty">
                    <p>{{ __('messages.cellar_index_message_empty') }}</p>
                </div>
            @endforelse
        </div>

</x-app-layout>
