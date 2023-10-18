<x-layout title="Séries">

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar séries</a>

    @isset($mensagemSucesso)
        
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>

    @endisset
    <ul class="list-group">

        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
          

                <div class="d-flex flex-row align-items-center gap-2">
                    <a href="{{ route('series.show', $serie->id)}}">
                        <i class="bi bi-plus-circle-fill">
                       </i>
                    </a>
    
                    <small class="fs-5 fw-medium">{{ $serie->nome }}</small>
    
                </div>
               
                
                <span class="d-flex">
                    <a href="{{ route('series.edit', $serie->id)}}" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                <form action="{{ route('series.destroy', $serie->id) }}" method="POST" class="ms-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm text-end">
                        X
                    </button>
          
                    </form>

                </span>

                </li>
                   
        @endforeach
        <form action="">

        
        </form>
        
    </ul>
</x-layout>
