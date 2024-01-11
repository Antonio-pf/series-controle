<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Controle de séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="bg-custom">



<nav class="navbar navbar-expand-lg navbar light bg-light">
    <div class="container-fluid">
        <a href="{{ route('series.index') }}" class="navbar-brand">Home</a>

        @auth
            <a href="{{ route('logout') }}">Sair</a>
        @endauth

        @guest
            <a href="{{ route('login') }}">Entrar</a>
        @endguest

    </div>
</nav>


{{--@if($ramdomSeries)--}}
{{--<div class="container-fluid features mb-5">--}}
{{--    <div class="container py-5">--}}
{{--        <div class="row g-4">--}}
{{--            @foreach($ramdomSeries as $serie)--}}
{{--            <div class="col-md-4 col-lg-4 col-xl-4">--}}
{{--                <div class="row g-4 align-items-center">--}}
{{--                    <div class="col-4">--}}
{{--                        <div class="rounded position-relative">--}}
{{--                            <div class="overflow-hidden rounded">--}}
{{--                                <img src="https://image.tmdb.org/t/p/w500/{{ $serie->poster_path }}" class="img-thumbnail img-fluid rounded w-500" alt="{{ $serie->name }}">--}}
{{--                            </div>--}}

{{--                            <span class=" border border-2 border-white bg-primary btn-sm-square text-white position-absolute" style="top: 1%; right: -20px; border-radius: 50%;">--}}
{{--                                <span class="m-2">{{ $serie->vote_average }}</span></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-8">--}}
{{--                        <div class="features-content d-flex flex-column">--}}
{{--                            <p class="text-uppercase mb-2">{{ $serie->original_name }}</p>--}}
{{--                            <a href="#" class="h6">--}}

{{--                            </a>--}}
{{--                            <small class="text-body d-block">Lançamento: <i class="fas fa-calendar-alt me-1"></i> {{ \Carbon\Carbon::parse($serie->first_air_date)->format('d/m/Y') }}</small>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endif--}}

<div class="container mt-3 mb-3">
        <h1>{{ $title }} </h1>

        @isset($mensagemSucesso)

        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </div>



</body>

</html>
