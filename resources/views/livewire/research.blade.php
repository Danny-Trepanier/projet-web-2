<div class="research">
    <div class="filters--search-bar">
        <input wire:model.debounce.1s="name" type="text" placeholder="{{ __('messages.cellar_show_search_bar_placeholder') }}">
    </div>

    <div>

    @if ($name == "")
{{-- {{ dd($myCellars) }} --}}
        @forelse($myCellars as $myBottle)

                <a href="{{ url("") }}/bottle/{{ $myBottle->id ?? $myBottle['id'] }}">
                    <article class="wine-card">
                        <div class="img-wrap">
                            <img src="{{ $myBottle->image_link ?? $myBottle['image_link'] }}?quality=80&fit=bounds&height=166&width=111&canvas=111:166 " alt="{{ $myBottle->name ?? $myBottle['name'] }}">
                        </div>
                        <div class="info-wrap">
                            <div class="info--text">
                                <h1>{{ $myBottle->name ?? $myBottle['name'] }}</h1>
                                <div>
                                    <p>{{ $myBottle->country ?? $myBottle['country'] }}</p>
                                    <p>{{ trans_choice('messages.cellar_show_quantity_text', $myBottle->bottleCount) }}
                                        {{ $myBottle->bottleCount ?? $myBottle['bottleCount'] }}
                                    </p>
                                    <p>{{ $myBottle->price ?? $myBottle['price'] }}$</p>
                                </div>
                            </div>
                            <div class="info--icons">

            <!-- Déploiement de l'icone de couleur selon les infos de la bouteille  -->
                    @if($myBottle->color ?? $myBottle['color'] == 'rouge')
                                <img src="{{ asset('img/icon/icone_vin_rouge.png') }}" alt="icone vin rouge">
                    @elseif($myBottle->color ?? $myBottle['color'] == 'blanc')
                                <img src="{{ asset('img/icon/icone_vin_blanc.png') }}" alt="icone vin rouge">
                    @elseif($myBottle->color ?? $myBottle['color'] == 'rosé')
                                <img src="{{ asset('img/icon/icone_vin_rose.png') }}" alt="icone vin rouge">
                    @endif

            <!-- Affichage de la note laissée par l'usager sur la bouteille -->
                                {{-- @if($myBottle->comment)
                                    <div>
                                        <span><b>{{ $myBottle->comment->note }}</b></span>
                                        <img src="{{ asset('img/icon/icon_etoile_rouge.png') }}" alt="icone etoile note">
                                    </div>
                                @else
                                    <div>
                                        <span><b>/</b></span>
                                        <img src="{{ asset('img/icon/icon_etoile_vide.png') }}" alt="icone etoile vide">
                                    </div>
                                @endif --}}
                            </div>
                        </div>
                    </article>
                </a>

            @empty
                <p>{{ __('messages.cellar_show_cellar_empty') }}</p>
            @endforelse

    @elseif ($name)

        @forelse($allBottles as $myBottle)

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
                                <p>{{ trans_choice('messages.cellar_show_quantity_text', $myBottle['bottleCount']) }}
                                    {{ $myBottle['bottleCount'] }}
                                </p>
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
                            {{-- @if($myBottle->comment)
                                <div>
                                    <span><b>{{ $myBottle->comment->note }}</b></span>
                                    <img src="{{ asset('img/icon/icon_etoile_rouge.png') }}" alt="icone etoile note">
                                </div>
                            @else
                                <div>
                                    <span><b>/</b></span>
                                    <img src="{{ asset('img/icon/icon_etoile_vide.png') }}" alt="icone etoile vide">
                                </div>
                            @endif --}}
                        </div>
                    </div>
                </article>
            </a>

        @empty
            <p>{{ __('messages.cellar_show_search_result_empty') }}</p>
        @endforelse

    @endif

    </div>
</div>


