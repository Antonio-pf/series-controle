<x-layout title="Séries">

    <a href="{{ route('serie.criar') }}" class="btn btn-dark mb-2">Adicionar séries</a>
    <ul class="list-group">

        @foreach ($series as $serie)
            <li class="list-group-item">{{ $serie->nome }}</li>
        @endforeach


    </ul>
</x-layout>
