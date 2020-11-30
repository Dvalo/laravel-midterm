<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieGenres extends Model
{
	protected $table = 'movie_genres';
	protected $primaryKey = 'movies_id';
	public $timestamps = false;

    protected $fillable=[
    	"movies_id","genres_id"
    ];


}
