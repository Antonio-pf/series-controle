<?php

namespace App\Repositories;

use App\Models\Season;
use Illuminate\Http\Request;

interface EpisodeRepository
{
    public function update(Request $request, Season $season): Season;
}