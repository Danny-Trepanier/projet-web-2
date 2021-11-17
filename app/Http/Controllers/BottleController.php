<?php

namespace App\Http\Controllers;

use App\Models\Bottle;
use App\Models\Cellar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BottleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Afficher le résultat du "scraper" ici
        // Pour le moment, on affiche les bouteilles de notre base de donnée
        $bottles = Bottle::all();

        return view('bottle.index', [
            'bottles' => $bottles
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
            'color' => 'required|max:20',
            'ml_quantity' => 'required',
            'country' => 'required|max:255',
            'code' => 'required|unique:bottles|max:255',
            'price' => 'required',
            'image_link' => 'required',
        ]);

        $bottle = Bottle::create([
            'name' => $bottlePost->name,
            'color' => $bottlePost->color,
            'ml_quantity' => $bottlePost->ml_quantity,
            'country' => $bottlePost->country,
            'code' => $bottlePost->code,
            'price' => $bottlePost->price,
            'image_link' => $bottlePost->image_link,
        ]);

        return redirect('bottle/' . $bottle->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function show(Bottle $bottlePost)
    {

        return view('bottle.show', [
            'bottle' => $bottlePost,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bottle $bottle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bottle $bottle)
    {
        //
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
