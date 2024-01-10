<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\String\s;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {

    }
    public function index()
    {

        $query = Series::query();
        if(request()->has('nome')) {
           $query->where('nome', request()->nome)->paginate();
        }
        return $query->paginate(5);
    }

    public function store(SeriesFormRequest $request)
    {

        return response()->json( $this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {

        $seriesModel = Series::with('seasons.episodes')->find($series);

        if($seriesModel === null) {
            return response()->json(['message' => 'Series not found'],404);
        }
        return $seriesModel;
    }

    public function update(int $series, SeriesFormRequest $request)
    {

        return Series::where('id', $series)->update($request->all());

    }

    public function destroy(int $series)
    {
        Series::destroy($series);

        return response()->noContent();
    }

}
