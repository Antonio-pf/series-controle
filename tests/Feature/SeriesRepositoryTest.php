<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Providers\SeriesRepositoryProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_when_a_series_is_created_its_seasons_and_episodes_must_also_be_created(): void
    {

        //arrange

        $repository = $this->app->make(SeriesRepositoryProvider::class);
        $request = new SeriesFormRequest();
        $request->nome = 'nome série';
        $request->seasonQty = 1;
        $repository->episodesPerSeason = 1;
        $repository->add($request);

        //act
        $repository->add($request);

        //assert
        $this->assertDatabaseHas('series', [ 'nome' => 'nome série']);
        $this->assertDatabaseHas('seasons', ['number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);


    }
}
