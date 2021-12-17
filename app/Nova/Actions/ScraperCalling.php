<?php

namespace App\Nova\Actions;

use Exception;
use Goutte\Client;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScraperCalling extends Action
{
    use InteractsWithQueue, Queueable;

    public $name = 'Mettre à jour la liste de vin';

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $adata = [];
        $first_page = $fields->page;
        $last_page = $first_page + 9;
        $product_list_limit = 96;
        $client = new Client();

        for($i=$first_page; $i<=$last_page; $i++) {
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
                    //array_push($adata, $data);
                    DB::table('bottles')->updateOrInsert(
                        ['code' => $data["code"]],
                        $data
                    );
                }
                catch (Exception $e) {
                    echo 'Impossible de prendre la bouteille '.$name;
                    echo "<br>";
                    // Pourquoi sommes-nous capable d'avoir accès à la bouteille même en cas erreur ?
                    // On peut quand même l'ajouter à notre tableau !?
                    // $data = array(
                    //     "name" => $name,
                    //     "image_link" => substr($image_link, 0, -58),
                    //     "code" => $code,
                    //     "price" => substr($price, 0, -3),
                    //     "color" => substr($color, -5),
                    //     "ml_quantity" => $ml_quantity,
                    //     "country" => $country,
                    // );
                    // array_push($adata, $data);
                }
            }
        }
    }

    /**
     * Get the displayable name of the action.
     *
     * @return string
     */
    public function name()
    {
        return __('Mettre à jour la liste de vin');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Select::make('page')->options([
                1 => 'Page 1 à 10',
                11 => 'Page 11 à 20',
                21 => 'Page 21 à 30',
                31 => 'Page 31 à 40',
                41 => 'Page 41 à 50',
                51 => 'Page 51 à 60',
                61 => 'Page 61 à 70',
                71 => 'Page 71 à 80',
                81 => 'Page 81 à 90',
                91 => 'Page 91 à 100',
            ]),
        ];
    }
}
