<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::with(['seasons'])->get();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with(['series' => $series, 'mensagemSucesso' => $mensagemSucesso]);
    }

    public function create() 
    {
    
        return view('series.create');
        
    }

    public function store(SeriesFormRequest $request) 
    {
    
        $serie = Series::create($request->all());

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionado com sucesso!");
        
    }

    public function destroy(Series $series) {

        
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
