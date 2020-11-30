<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
	public $timestamps = false;

    protected $fillable=[
    	"mov_title","mov_cover","mov_length","mov_lang","mov_rel_date","mov_rel_country"
    ];

    public function directors()
    {
        return $this->belongsToMany('App\Directors', 'movie_directors');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genres', 'movie_genres');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Actors', 'movie_actors')->withPivot('role');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
