<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Cellar;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // On affiche les bouteilles de notre base de donnée
        $bottles = Bottle::all();

		// La note donnée par l'usager
		$comments = Comment::all()->where('user_id', Auth::user()->id );
		//dd($comments);
        return view('bottle.index', [
            'bottles' => $bottles,
			'comments' => $comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bottle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $bottlePost)
    {
        $bottlePost->validate([
            'name' => 'required|min:4|max:255',
            'color' => 'required',
            'ml_quantity' => 'required',
            'country' => 'required',
            'price' => 'required|numeric',
        ]);

        $bottle = Bottle::create([
            'name' => $bottlePost->name,
            'color' => $bottlePost->color,
            'ml_quantity' => $bottlePost->ml_quantity,
            'country' => $bottlePost->country,
            'price' => $bottlePost->price,
            'image_link' => 'https://via.placeholder.com/400x600',
        ]);

        return redirect('bottle/' . $bottle->id );
    }

    /**
     * Ajoute une note à une bière.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $bottlePost)
    {
        $bottlePost->validate([
            'note' => 'required|min:1|max:5',
        ]);

        $bottle = Comment::updateOrCreate(
            [
                'bottle_id' => $bottlePost->bottle_id,
                'user_id' => Auth::user()->id,
            ],
            [
                'note' => $bottlePost->note,
            ]
        );

        return redirect('bottle/' . $bottle->bottle_id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function show(Bottle $bottlePost)
    {
        // Nous prenons tous les celliers de l'utilisateur
        $myCellars = Cellar::get()->where('user_id', Auth::user()->id);
		
        return view('bottle.show', [
            'bottle' => $bottlePost,
            'myCellars' => $myCellars
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bottle $bottlePost)
    {
        return view('bottle.edit', [
            'bottle' => $bottlePost
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bottle $bottlePost)
    {
        $request->validate([
            'name' => 'required|min:4|max:255',
            'color' => 'required',
            'ml_quantity' => 'required',
            'country' => 'required',
            'price' => 'required|numeric',
        ]);

        $bottlePost->update([
            'name' => $request->name,
            'color' => $request->color,
            'ml_quantity' => $request->ml_quantity,
            'country' => $request->country,
            'price' => $request->price,
        ]);

        return redirect('bottle/' . $bottlePost->id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bottle $bottle)
    {
        //
    }
}
