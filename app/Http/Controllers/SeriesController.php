<?php

namespace App\Http\Controllers;

use App\Events\DeleteSeriesCover;
use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use App\Service\TmdbService;
use Illuminate\Http\Request;
class SeriesController extends Controller
{

    protected $tmdbService;
    public function __construct(private SeriesRepository $repository, TmdbService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
        $this->middleware(Autenticador::class)->except('index');
    }
    public function index()
    {

        $ramdomSeries = $this->tmdbService->getRandomRatedSeries();

        $series = Series::with(['seasons'])->paginate(5);

        $mensagemSucesso = session('mensagem.sucesso');
        $user = auth()->user();

        return view('series.index')
        ->with([
            'series' => $series,
            'mensagemSucesso' => $mensagemSucesso,
            'user' => $user,
            'ramdomSeries' => $ramdomSeries
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {


        $coverPath = $request->hasFile('cover') ? $request->file('cover')
            ->store('series_cover', 'public') : null;

        $request->coverPath = $coverPath;

        $serie = $this->repository->add($request);
        $seriesCreatedEvent = new EventsSeriesCreated(
            $serie->nome,
            $serie->id,
            $request->seasonQty,
            $request->episodesForSeason

        );
       event($seriesCreatedEvent);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionado com sucesso!");
    }

    public function destroy(Series $series)
    {

        if ($series->cover !== null)
            DeleteSeriesCover::dispatch($series->cover);

        $series->delete();
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série ' {$series->nome}' removida com sucesso!");
    }

    public function edit(Series $series)
    {

        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {

        // falta editar numro de eps e de seasons
        $series->fill($request->all());
        $series->save();


        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
    }


    public function show(Series $series)
    {

        return view('series.show')->with('serie', $series);
    }
}
