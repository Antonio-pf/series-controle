<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use DateTime;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware(Autenticador::class)->except('index');
    }
    public function index(Request $request)
    {
        
        $series = Series::with(['seasons'])->get();
        $mensagemSucesso = session('mensagem.sucesso');
        $user = auth()->user();
       
        return view('series.index')
        ->with([
            'series' => $series, 
            'mensagemSucesso' => $mensagemSucesso,
            'user' => $user,
        ]);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

       $request->validate([
            "nome" => $request->nome,
            "seasonQty" => $request->seasonQty,
            "episodesForSeason" => $request->episodesForSeason,
       ]);
    
        $serie = $this->repository->add($request);

        $userList = User::all();
        foreach($userList as $index => $user) {

        $email = new SeriesCreated(
            $serie->nome,
            $serie->id,
            $request->seasonQty,
            $request->episodesForSeason
        );
      
            $when = now()->addSeconds($index * 6);
            Mail::to($user)->later($when, $email);
            
        }
        

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionado com sucesso!");
    }

    public function destroy(Series $series)
    {

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
