<form action="{{ $action }}" method="post">
    @csrf

    @if ($update)
        @method('PUT')
    @endif
    <div class="row mb-3">
        <div class="col-8">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control"
            autofocus
                @isset($nome) value="{{ $nome }}"
           @endisset>
        </div>
        <div class="col-2">
            <label for="seasonQty" class="form-label">N: de temporadas:</label>
            <input type="text" 
                    id="seasonQty" 
                    name="seasonQty" 
                    class="form-control" 
                    @isset($seasonQty) value="{{ $seasonQty }}" @endisset>
        </div>

        <div class="col-2">
            <label for="episodesForSeason" class="form-label">Eps por temporada:</label>
            <input type="text" 
                    id="episodesForSeason" 
                    name="episodesForSeason" 
                    class="form-control" 
                    value="">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Adicionar
    </button>
</form>
