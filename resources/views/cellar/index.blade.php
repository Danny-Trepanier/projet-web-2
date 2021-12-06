<x-app-layout>

    <div class="title">
        <h1>{{ __('messages.cellar_index_title') }}</h1>
    </div>

        <div class="cellar--index">
            <div class="cellar--index-create">
                <button><a href="{{ url("") }}/cellar/create/cellar">{{ __('messages.cellar_index_link_create') }}</a></button>
            </div>
            @forelse ($cellars as $cellar)
                <div>
                    <h2 class="cellar--index-name">{{ $cellar->name }}</h2>
                    <button><a href="{{ url("") }}/cellar/{{ $cellar->id }}">{{ __('messages.cellar_index_link_see') }}</a></button>
                    <button><a href="{{ url("") }}/cellar/{{ $cellar->id }}/edit">{{ __('messages.cellar_index_link_update') }}</a></button>
                </div>
            @empty
                <div class="cellar--index-empty">
                    <p>{{ __('messages.cellar_index_message_empty') }}</p>
                </div>
            @endforelse
        </div>

</x-app-layout>
