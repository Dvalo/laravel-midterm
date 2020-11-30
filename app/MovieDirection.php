<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieDirection extends Model
{
	protected $table = 'movie_directors';
	public $timestamps = false;

    protected $fillable=[
    	"directors_id","movies_id"
    ];


}
