<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];

    public function season()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function numerOfWatchedEpisodes(): int
    {
        return $this->episodes->
        filter(fn ($episode) => $episode->watched)
        ->count();
    }

}
