<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    public $timestamps = false;

    protected $casts = [
        'watched' => 'bool',
    ];

    public function season()
    {
        $this->belongsTo(Season::class);
    }

    //acessors exemple
    protected function watched(): Attribute
    {
        return new Attribute(
            get: fn ($watched) => (bool) $watched,
            set: fn ($watched) => (bool) $watched
        );
    }

}
