<x-layout title="Detalhes">


<div class="col">
    <div class="card mb-4 rounded-3 shadow-sm">
      <div class="card-header py-3">
        <h4 class="my-0 fw-normal"> {{$serie->nome}}</h4>
      </div>
      <div class="card-body">
        <h1 class="card-title pricing-card-title">Avaliacao<small class="text-body-secondary fw-light"> colocar estrelas</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
          <li>Genero
          </li>
          <li>Número de temporadas: <b>{{ $serie->seasons->count()}}</b></li>
          <li>Número de episodes: <b> {{ $serie->seasons->first()->episodes->count() }}</b></li>
          
        </ul>
        <button type="button" class="w-100 btn btn-lg btn-primary">Link trailler</button>
      </div>
    </div>
  </div>
</x-layout>