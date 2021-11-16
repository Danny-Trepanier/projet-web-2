<h1>Création d'un cellier</h1>
<form action="" method="POST">
    @csrf
    <fieldset>
        <div class="form-group">
            <label for="exampleInputEmail1" class="form-label mt-4">Nom du cellier</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-floating mt-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="mt-3 mb-3">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </fieldset>
</form>
