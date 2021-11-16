<p>Nom du user: {{ $cellar->user->name }}</p>

<p>Nom du cellier: {{ $cellar->name }}</p>

<p>Dans mon cellier, il y a:</p>
<ul>
    @forelse ($myBottles as $myBottle)
    <li>{{ $myBottle->name }}</li>
    @empty
    <p>Vous possèdez aucune bouteille dans ce cellier.</p>
    @endforelse
</ul>
