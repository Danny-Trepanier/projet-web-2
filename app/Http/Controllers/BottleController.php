<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Cellar;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BottleController extends Controller
{
    /**
     * Affiche la vue de toutes les bouteilles de la SAQ et des notes de l'utilisateur.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On récupère les bouteilles de notre base de donnée pour les retourner
        $bottles = Bottle::all();

		// On récupère les notes sur les bouteilles que l'utilisateur à donnée pour les retourner
		$comments = Comment::all()->where('user_id', Auth::user()->id );

        return view('bottle.index', [
            'bottles' => $bottles,
			'comments' => $comments
        ]);
    }

    /**
     * Affiche la vue d'une bouteille.
     *
     * @param  \App\Models\Bottle  $bottle
     * @param  \Illuminate\Http\Request  $bottlePost
     * @return \Illuminate\Http\Response
     */
    public function show(Bottle $bottlePost)
    {
        // Nous prenons tous les celliers de l'utilisateur pour les retourner
        $myCellars = Cellar::get()->where('user_id', Auth::user()->id);

        return view('bottle.show', [
            'bottle' => $bottlePost,
            'myCellars' => $myCellars
        ]);
    }
}
