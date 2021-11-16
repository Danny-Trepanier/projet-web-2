<a href="{{ url("") }}/cellar/create/cellar">Créer un cellier</a>
@forelse ($cellars as $cellar)
<a href="{{ url("") }}/cellar/{{ $cellar->id }}">{{ $cellar->name }}</a>
<a href="{{ url("") }}/cellar/{{ $cellar->id }}/edit">Modifier</a>
@empty
<p>Vous possèdez aucun cellier pour le moment.</p>
@endforelse
