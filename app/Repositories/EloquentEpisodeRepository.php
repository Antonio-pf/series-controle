<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class EloquentEpisodeRepository implements EpisodeRepository
{
   
    public function update(Request $request, Season $season): Season
    {

        return DB::transaction(function () use ($request, $season) {

            $watchedEpisodes = $request->episodes;

            $season->episodes->each(function(Episode $episode) use ($watchedEpisodes){
    
                $episode->watched = in_array($episode->id, $watchedEpisodes);
            });
            $season->push();
           
            return $season;
        });
        
    }
    
}
