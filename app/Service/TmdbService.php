<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\table;

class TmdbService
{

    protected $apiKey;
    protected $accessToken;

    public function __construct()
    {
        $this->accessToken = env('TMDB_ACCESS_TOKEN');
    }

    public function getRandomRatedSeries()
    {

        $url = "https://api.themoviedb.org/3/tv/top_rated?page=5";

        $response = Http::withToken($this->accessToken)->get($url);
        $randomSeries = collect($response->json()['results'])->shuffle()->take(3)->map(function ($serie){

            $serie["vote_average"] = round($serie["vote_average"] , 1);
            return (object) $serie;
        });

        return $randomSeries;
    }

}
