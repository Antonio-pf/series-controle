<?php

namespace App\Listeners;

use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EmailUserAbourSeriesCreated implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventsSeriesCreated $event): void
    {
        $userList = User::all();
        foreach($userList as $index => $user) {

        $email = new SeriesCreated(
            $event->seriesName,
            $event->seriesId,
            $event->seriesSeasonQty,
            $event->seriesEpisodesForSeason
        );
      
            $when = now()->addSeconds($index * 6);
            Mail::to($user)->later($when, $email);
            
        }
    }
}
