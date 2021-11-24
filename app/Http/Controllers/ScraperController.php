<?php

namespace App\Http\Controllers;

use Exception;
use Goutte\Client;
use App\Models\Bottle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScraperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adata = [];
        $numberPage = 10;
        $product_list_limit = 96;
        $client = new Client();

        for($i=1; $i<=$numberPage; $i++) {
            $url = "https://www.saq.com/fr/produits/vin?p={$i}&product_list_limit={$product_list_limit}";
            $page = $client->request('GET', $url);

            for($j=1; $j<=$product_list_limit; $j++) {
                try {
                    $name = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/div[3]/div[1]/div[1]/strong[1]/a")->text();
                    $image_link = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/a/span[2]/span/img")->attr('src');
                    $code = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/div[3]/div[1]/div[1]/div[2]/span[2]")->text();
                    $price = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/div[3]/div[1]/div[1]/div[4]/span/span/span")->text();
                    $color = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/div[3]/div[1]/div[1]/strong[2]/span/text()[1]")->text();
                    $ml_quantity = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/div[3]/div[1]/div[1]/strong[2]/span/text()[2]")->text();
                    $country = $page->filterXPath("//html/body/div[3]/div[2]/div[1]/main/div/div[2]/div[3]/ol/li[{$j}]/div/div[3]/div[1]/div[1]/strong[2]/span/text()[3]")->text();

                    // On remplace la virgule par un point pour éviter une erreur sql
                    $price = str_replace(",", ".", $price);

                    $data = array(
                        "name" => $name,
                        "image_link" => substr($image_link, 0, -58),
                        "code" => $code,
                        "price" => substr($price, 0, -3),
                        "color" => substr($color, -5),
                        "ml_quantity" => $ml_quantity,
                        "country" => $country,
                    );
                    array_push($adata, $data);
                }
                catch (Exception $e) {
                    echo 'Impossible de prendre la bouteille '.$name;
                    echo "<br>";
                    // Pourquoi sommes-nous capable d'avoir accès à la bouteille même en cas erreur ?
                    // On peut quand même l'ajouter à notre tableau !?
                    $data = array(
                        "name" => $name,
                        "image_link" => substr($image_link, 0, -58),
                        "code" => $code,
                        "price" => substr($price, 0, -3),
                        "color" => substr($color, -5),
                        "ml_quantity" => $ml_quantity,
                        "country" => $country,
                    );
                    array_push($adata, $data);
                }
            }
        }

        //dd($adata);
        DB::table('bottles')->insert($adata);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bottle  $bottle
     * @return \Illuminate\Http\Response
     */
    public function show(Bottle $bottle)
    {
        //
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
