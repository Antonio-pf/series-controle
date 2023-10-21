<x-layout title="Nova série">


    <x-series.form 
    :action="route('series.store')"
    :update="true"
/>
    <form action="{{ route('series.store') }}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" 
                        autofocus
                        id="nome" 
                        name="nome" 
                        class="form-control" 
                        value="{{ old('nome') }}">
            </div>

            <div class="col-2">
                <label for="seasonQty" class="form-label">N de temporadas:</label>
                <input type="text" 
                        id="seasonQty" 
                        name="seasonQty" 
                        class="form-control" 
                        value="{{ old('seasonQty') }}">
            </div>
    
            <div class="col-2">
                <label for="episodesForSeason" class="form-label">Eps por temporada:</label>
                <input type="text" 
                        id="episodesForSeason" 
                        name="episodesForSeason" 
                        class="form-control" 
                        value="{{ old('episodesForSeason') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Adicionar

        </button>

        
    </form>

</x-layout>
