<?php

namespace App\Service;

use App\Models\Bottle;
use App\Models\BottleCellar;
use App\Models\Cellar;

// Tutoriel youtube https://www.youtube.com/watch?v=QfZgqYV5pac

class ResearchText {

    public static function searchByText($myCellars, string $text)
    {
        return collect($myCellars)->filter(function($value, $key) {
            dump($value, $key);
        });
    }

}



?>
