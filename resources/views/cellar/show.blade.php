<x-app-layout>

    <div class="cellar--show-title">
        <h1>{{ $cellar->name }}</h1>
    </div>

    <section class="filters">

        @livewire('research', [
            'myCellars' => $myCellars,
            'comments' => $comments
        ])

	</section>

</x-app-layout>
