<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\s;

class SeriesController
{

    public function __construct(private SeriesRepository $seriesRepository)
    {

    }
    public function index()
    {

        return Series::all();

    }

    public function store(SeriesFormRequest $request)
    {

        return response()->json( $this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {

        return $series;
    }

}
