<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieCast extends Model
{
	protected $table = 'movie_cast';
	public $timestamps = false;

    protected $fillable=[
    	"act_id","mov_id", "role"
    ];


}
