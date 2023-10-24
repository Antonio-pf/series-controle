<?php

namespace App\Providers;

use App\Repositories\EloquentEpisodeRepository;
use App\Repositories\EpisodeRepository;

use Illuminate\Support\ServiceProvider;

class EpisodeRepositoryProvider extends ServiceProvider
{

    public array $bindings = [
        EpisodeRepository::class => EloquentEpisodeRepository::class
    ];
    /**
     * Register services.
     */
}
