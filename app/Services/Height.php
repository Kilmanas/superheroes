<?php

namespace App\Services;

use App\Models\Superhero;

class Height
{
    public function boot()
    {

    }

    public static function convert($superhero)
    {
        $meters = intdiv($superhero->height, 100);
        $centimeters = $superhero->height % 100;
        $height = "$meters m. $centimeters cm.";
        return $height;
    }
}
