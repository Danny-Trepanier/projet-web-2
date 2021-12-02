<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\BottleCellar;
use App\Models\Cellar;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CellarController extends Controller
{
    /**
     * Affiche la liste des celliers de l'utilisateur.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Nous prenons tous les celliers de l'utilisateur
        $myCellars = Cellar::get()->where('user_id', Auth::user()->id);

        return view('cellar.index', [
            'cellars' => $myCellars
        ]);
    }

    /**
     * Nous affichons la vue de la création d'un cellier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cellar.create');
    }

    /**
     * Nous enregistrons le cellier dans notre base de donnée.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $cellarPost)
    {

        $cellarPost->validate([
            'name' => 'required|min:4|max:255',
        ]);

        $cellar = Cellar::create([
            'name' => $cellarPost->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect('cellar/' . $cellar->id );
    }

    /**
     * Affiche le cellier.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function show(Cellar $cellarPost)
    {
        $this->authorize('view', $cellarPost);

        $myCellars = Cellar::find($cellarPost->id);

        return view('cellar.show', [
            'cellar' => $cellarPost,
            'myCellars' => $myCellars,
        ]);
    }

    /**
     * Affiche le formulaire pour éditer le cellier de l'utilisateur.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellar $cellarPost)
    {
        $this->authorize('update', $cellarPost);

        return view('cellar.edit', [
            'cellar' => $cellarPost
        ]);
    }

    /**
     * Met à jour les informations du cellier.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cellar $cellarPost)
    {
        $this->authorize('update', $cellarPost);

        $request->validate([
            'name' => 'required|min:4|max:255',
        ]);

        $cellarPost->update([
            'name' => $request->name,
        ]);

        return redirect('cellar/' . $cellarPost->id);
    }

    /**
     * Supprimer le cellier de l'utilisateur.
     *
     * @param  \App\Models\Cellar  $cellar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellar $cellarPost)
    {
        $this->authorize('delete', $cellarPost);

        $cellarPost->delete();

        return redirect('/cellar');
    }
}
