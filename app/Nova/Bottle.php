<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use App\Nova\Metrics\NewBottles;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\Currency;
use App\Nova\Metrics\BottlesPerDay;
use App\Nova\Metrics\BottlesPerColor;
use Laravel\Nova\Http\Requests\NovaRequest;

class Bottle extends Resource
{
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
            ID::make(__('ID'), 'id')->sortable()->rules('required', 'max:255'),
            Text::make('Nom', 'name')->sortable()->rules('required', 'max:255'),
            Select::make('Couleur', 'color')->options([
                'Rouge' => 'Rouge',
                'Blanc' => 'Blanc',
                'Rosé' => 'Rosé',
            ])->sortable()->rules('required', 'max:20'),
            Number::make('Quantité ml', 'ml_quantity')->sortable()->rules('required'),
            Country::make('Pays', 'country')->sortable()->rules('required', 'max:255'),
            Text::make('Code', 'code')->rules('required', 'max:255'),
            Number::make('Prix', 'price')->step(0.01)->sortable()->rules('required'),
            Image::make('Lien image', 'image_link')->disk('public')->disableDownload()->creationRules('required'),
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
            (new Metrics\BottlesPerDay()),
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
        return [];
    }
}
