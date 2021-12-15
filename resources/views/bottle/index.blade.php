<x-app-layout>

	<div class="title">
        <h1>{{ __('messages.bottle_index_title') }}</h1>
    </div>

	<section class="filters">

        @livewire('research-saq', [
            'bottles' => $bottles,
            'comments' => $comments
            ])

    </section>

</x-app-layout>
