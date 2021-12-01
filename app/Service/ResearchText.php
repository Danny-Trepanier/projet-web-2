<?php

namespace App\Service;

use App\Models\Bottle;
use App\Models\BottleCellar;
use App\Models\Cellar;

// Tutoriel youtube https://www.youtube.com/watch?v=QfZgqYV5pac

class ResearchText {

    public static function searchByText(string $text)
    {
        return collect(self::aCellar())->filter(function($value, $key) {
            dump($value, $key);
        });
    }

    public static function aCellar()
    {
        $myCellars = Cellar::all();
        return $myCellars;
    }

}






?>
