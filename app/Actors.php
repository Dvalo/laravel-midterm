<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{
	protected $table = 'actors';
	public $timestamps = false;
	
    protected $fillable=[
    	"name","gender","image","birth_location","date_of_birth"
    ];

    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'movie_actors');
    }
}
