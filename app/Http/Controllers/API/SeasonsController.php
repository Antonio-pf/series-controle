<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;

use App\Models\Series;

class SeasonsController extends Controller
{

    public function seasons(Series $series)
    {
        return $series->seasons;
    }


    public function episodes(Series $series)
    {
        return $series->episodes;
    }

}
