<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Nova\Fields\Select;

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
        //
        
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Select::make('Nombre de page à scraper')->options([
                '1' => 1,
                '5' => 5,
                '10' => 10,
                '15' => 15,
                '30' => 30,
                '50' => 50,
                '100' => 100,
            ]),
            Select::make('Nombre de produit par page')->options([
                '24' => 24,
                '48' => 48,
                '96' => 96,
            ]),
        ];
    }
}
