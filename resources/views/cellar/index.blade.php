<x-app-layout>

    <div class="title">
        <h1>{{ __('messages.cellar_index_title') }}</h1>
    </div>

        <div class="cellar--index">
            <div class="cellar--index-create">
                <a href="{{ url("") }}/cellar/create/cellar"><button>{{ __('messages.cellar_index_link_create') }}</button></a>
            </div>
            @forelse ($cellars as $cellar)
                <div>
                    <h2 class="cellar--index-name">{{ $cellar->name }}</h2>
                    <a href="{{ url("") }}/cellar/{{ $cellar->id }}"><button>{{ __('messages.cellar_index_link_see') }}</button></a>
                    <a href="{{ url("") }}/cellar/{{ $cellar->id }}/edit"><button>{{ __('messages.cellar_index_link_update') }}</button></a>
                </div>
            @empty
                <div class="cellar--index-empty">
                    <p>{{ __('messages.cellar_index_message_empty') }}</p>
                </div>
            @endforelse
        </div>

</x-app-layout>
