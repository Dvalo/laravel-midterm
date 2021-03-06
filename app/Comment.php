<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
    	"user_id","movies_id","comment_content"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
