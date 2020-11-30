<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directors extends Model
{
	protected $table = 'directors';
	public $timestamps = false;

    protected $fillable=[
    	"dir_name","dir_image"
    ];

    public function movies()
    {
        return $this->belongsToMany('App\Movies', 'movie_directors');
    }

}
