<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    protected $fillable = [
    	'title','body','like','user_id','bussine_id','lang_id',
    ];

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }   

     public function user()
    {
        return $this->belongsTo(User::class);
    }    

     public function bussine()
    {
        return $this->belongsTo(Bussine::class);
    }    

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public  function scopeSearch($query,$name)
    {
        return $query->join('users','users.id','=','comments.user_id')
                            ->join('bussines','bussines.id','=','comments.bussine_id')
                            ->where('comments.title','LIKE',"%$name%")
                            ->orwhere('users.email','LIKE',"%$name%")
                            ->orwhere('bussines.name','LIKE',"%$name%")
                            ->select('comments.*')
                            ->orderBy('created_at','desc')
                            ->paginate(10);
    }


}
