<div class="research">
    <div class="filters--search-bar">
        <input wire:model.debounce.700ms="name" type="text" placeholder="{{ __('messages.cellar_show_search_bar_placeholder') }}">
    </div>

    <section class="liste-wrap">

        @if (!$name)

            <p class="research--empty">{{ __('messages.bottle_index_empty') }}</p>

        @else

            @forelse($allBottlesSaq as $myBottle)

                <a href="{{ url("") }}/bottle/{{ $myBottle['id'] }}">
                    <article class="wine-card">
                        <div class="img-wrap">
                            <img src="{{ $myBottle['image_link'] }}?quality=80&fit=bounds&height=166&width=111&canvas=111:166 " alt="{{ $myBottle['name'] }}">
                        </div>
                        <div class="info-wrap">
                            <div class="info--text">
                                <h1>{{ $myBottle['name'] }}</h1>
                                <div>
                                    <p>{{ $myBottle['country'] }}</p>
                                    <p>{{ $myBottle['bottleCount'] }}</p>
                                    <p>{{ $myBottle['price'] }}$</p>
                                </div>
                            </div>
                            <div class="info--icons">

                                <!-- Déploiement de l'icone de couleur selon les infos de la bouteille  -->
                                @if($myBottle['color'] == 'rouge')
                                            <img src="{{ asset('img/icon/icone_vin_rouge.png') }}" alt="icone vin rouge">
                                @elseif($myBottle['color'] == 'blanc')
                                            <img src="{{ asset('img/icon/icone_vin_blanc.png') }}" alt="icone vin rouge">
                                @elseif($myBottle['color'] == 'rosé')
                                            <img src="{{ asset('img/icon/icone_vin_rose.png') }}" alt="icone vin rouge">
                                @endif

                                <!-- Affichage de la note laissée par l'usager sur la bouteille -->
                                @forelse($comments as $comment)
                                    @if($myBottle['id'] == $comment->bottle_id)
                                        <div>
                                            <span><b>{{ $comment->note }}</b></span>
                                            <img src="{{ asset('img/icon/icon_etoile_rouge.png') }}" alt="icone etoile note">
                                        </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </article>
                </a>

            @empty
                <p class="research--empty">{{ __('messages.bottle_index_search_result_empty') }}</p>
            @endforelse

        @endif

    </section>
</div>


