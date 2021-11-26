<x-app-layout>

    <x-slot name="header">
        <h1>Cellar</h1>
    </x-slot>

        <div class="cellar--index">
            <div class="cellar--index-create">
                <a href="{{ url("") }}/cellar/create/cellar" class="cellar--index-link">Create a cellar</a>
            </div>
            @forelse ($cellars as $cellar)
                <div>
                    <h2 class="cellar--index-name">{{ $cellar->name }}</h2>
                    <a href="{{ url("") }}/cellar/{{ $cellar->id }}" class="cellar--index-link">See</a>
                    <a href="{{ url("") }}/cellar/{{ $cellar->id }}/edit" class="cellar--index-link">Update</a>
                </div>
            @empty
                <div class="cellar--index-empty">
                    <p>You have no storeroom at the moment.</p>
                </div>
            @endforelse
        </div>

</x-app-layout>
