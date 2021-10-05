<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
    	'body','user_id','commenter','readed',
    ];

      public function user()
    {
        return $this->belongsTo(User::class);
    }    

     public function scopeSearch($query,$name)
    {
        return $query->join('users','users.id','=','messages.user_id')
        		     ->where('users.email','LIKE',"%$name%")
        		     ->orwhere('messages.comenter','LIKE',"%$name%")
        		     ->select('messages.*')
                             ->orderBy('created_at','desc')
        		     ->paginate(10);
    }

    public function scopeBuscar($query,$email)
    {
        return $query->where('comenter',1)
                            ->where('body','LIKE',"%$email%")
                            ->orderBy('created_at','Desc')
                            ->paginate(5);
    }


}
