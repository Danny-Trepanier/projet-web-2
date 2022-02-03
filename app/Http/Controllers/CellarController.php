<?php

namespace App\Http\Controllers;

use App\Models\Cellar;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // Nous prenons tous les celliers de l'utilisateur pour les retourner
        $myCellars = Cellar::get()->where('user_id', Auth::user()->id);

        return view('cellar.index', [
            'cellars' => $myCellars
        ]);
    }

    /**
     * Affiche la vue de la création d'un cellier.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cellar.create');
    }

    /**
     * Enregistre le cellier dans notre base de donnée.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Request  $cellarPost
     * @return \Illuminate\Http\Response
     */
    public function store(Request $cellarPost)
    {

        $cellarPost->validate([
            'name' => 'required|min:4|max:255',
        ]);

        Cellar::create([
            'name' => $cellarPost->name,
            'user_id' => Auth::user()->id
        ]);

        return redirect('cellar');
    }

    /**
     * Affiche le cellier d'un utilisateur.
     *
     * @param  \App\Models\Cellar  $cellar
     * @param  \Illuminate\Http\Request  $cellarPost
     * @return \Illuminate\Http\Response
     */
    public function show(Cellar $cellarPost)
    {
        // Empêche l'utilisateur de voir des celliers qui sont pas à lui
        $this->authorize('view', $cellarPost);

        // On récupère les notes sur les bouteilles que l'utilisateur à donnée pour les retourner
        $comments = Comment::all()->where('user_id', Auth::user()->id );

        // On récupère les celliers de l'utilisateur et les bouteilles à l'intérieur de ces celliers pour les retourner
        $myCellars = DB::table('bottle_cellar')
                            ->join('bottles', 'bottle_cellar.bottle_id', '=', 'bottles.id')
                            ->select(DB::raw('count(bottle_id) as bottleCount'), 'bottle_cellar.cellar_id', 'bottles.*')
                            ->where('cellar_id', '=', $cellarPost->id)
                            ->groupBy('bottle_id')
                            ->get();

        return view('cellar.show', [
            'cellar' => $cellarPost,
            'myCellars' => $myCellars,
            'comments' => $comments,
        ]);
    }

    /**
     * Affiche la vue pour éditer le cellier de l'utilisateur.
     *
     * @param  \App\Models\Cellar  $cellar
     * @param  \Illuminate\Http\Request  $cellarPost
     * @return \Illuminate\Http\Response
     */
    public function edit(Cellar $cellarPost)
    {
        // Empêche l'utilisateur de modifier les celliers qui sont pas à lui
        $this->authorize('update', $cellarPost);

        return view('cellar.edit', [
            'cellar' => $cellarPost
        ]);
    }

    /**
     * Met à jour les informations du cellier de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cellar  $cellar
     * @param  \Illuminate\Http\Request  $cellarPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cellar $cellarPost)
    {
        // Empêche l'utilisateur de modifier les celliers qui sont pas à lui
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
     * Supprime le cellier de l'utilisateur.
     *
     * @param  \App\Models\Cellar  $cellar
     * @param  \Illuminate\Http\Request  $cellarPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cellar $cellarPost)
    {
        // Empêche l'utilisateur de supprimer un cellier qui est pas à lui
        $this->authorize('delete', $cellarPost);

        $cellarPost->delete();

        return redirect('/cellar');
    }
}
