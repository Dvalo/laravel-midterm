<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
	public $timestamps = false;

    protected $fillable=[
    	"gen_title"
    ];

    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'movie_direction');
    }
}
