<?php

namespace App\Service;

use App\Models\Bottle;
use App\Models\Cellar;
use Illuminate\Support\Str;
use App\Models\BottleCellar;

// Tutoriel youtube https://www.youtube.com/watch?v=QfZgqYV5pac

class ResearchText {

    public static function searchByName(string $name, $myCellars): array
    {
        return collect($myCellars)
            ->filter(fn($object) => Str::contains(strtolower($object['name']), strtolower($name)))
            ->all();
    }

    // public static function searchByCountry($myCellars, string $country): array
    // {
    //     return collect($myCellars)
    //         ->filter(fn($object) => Str::contains(strtolower($object->country), strtolower($country)))
    //         ->all();
    // }

    // public static function searchByColor($myCellars, string $color): array
    // {
    //     return collect($myCellars)
    //         ->filter(fn($object) => Str::contains(strtolower($object->color), strtolower($color)))
    //         ->all();
    // }

    // public static function searchByPrice($myCellars, string $price): array
    // {
    //     return collect($myCellars)
    //         ->filter(fn($object) => Str::contains(strtolower($object->price), strtolower($price)))
    //         ->all();
    // }

}



?>
