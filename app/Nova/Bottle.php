<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Country;

class Bottle extends Resource
{
    public $refreshWhenActionRuns = true;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Bottle::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return  __('nova::messages.nav_bottles_button');
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'code',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Nom', 'name')
                ->sortable()
                ->rules('required', 'min:4', 'max:255'),

            Select::make('Couleur', 'color')
                ->sortable()
                ->rules('required', 'max:20')
                ->options([
                    'Rouge' => 'Rouge',
                    'Blanc' => 'Blanc',
                    'Rosé' => 'Rosé',
                ]),

            Number::make('Quantité ml', 'ml_quantity')
                ->sortable()
                ->rules('required'),

            Country::make('Pays', 'country')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Code', 'code')
                ->rules('required', 'unique:bottles', 'max:255'),

            Number::make('Prix', 'price')
                ->sortable()
                ->step(0.01)
                ->rules('required'),

            Text::make('Lien image', 'image_link')->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            (new Metrics\NewBottles()),
            (new Metrics\BottlesPerColor()),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [

            Actions\ScraperCalling::make()->standalone()
        ];
    }
}
