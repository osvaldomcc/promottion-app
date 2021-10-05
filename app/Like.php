<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
    	'like','user_id','comment_id',
    ];


    public function comment()
    {
    	return $this->belongsTo(Comment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function scopeSearch($query,$name)
    {
        return $query->join('users','users.id','=','likes.user_id')
                             ->where('users.email','LIKE',"%$name%")
                             ->select('likes.*')
                             ->orderBy('created_at','desc')
                             ->paginate(10);
    }

}
