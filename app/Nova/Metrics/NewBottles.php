<?php

namespace App\Nova\Metrics;

use App\Models\Bottle;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Http\Requests\NovaRequest;

class NewBottles extends Value
{
    /**
     * Get the displayable name of the metric.
     *
     * @return string
     */
    public function name()
    {
        return __('Nouvelle Bouteille');
    }

    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        return $this->result(4883)->previous(50);
    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [
            30 => __('30 Jours'),
            60 => __('60 Jours'),
            365 => __('365 Jours'),
            'TODAY' => __('Aujourd\'hui'),
            'MTD' => __('Le mois courant'),
            'QTD' => __('Trimestre à ce jour'),
            'YTD' => __('Année à ce jour'),
        ];
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'new-bottles';
    }
}
