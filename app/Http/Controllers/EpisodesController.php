<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Repositories\EloquentEpisodeRepository;
use App\Repositories\EpisodeRepository;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    
    public function __construct(private EpisodeRepository $repository)
    {
        
    }
    public function index(Season $season)
    {
        return view('episodes.index', ['episodes' => $season->episodes]);
    }

    public function update(Request $request, Season $season)
    {



        $season = $this->repository->update($request, $season);

        return to_route('episodes.index', $season->id);
    }
}
