<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    	'path','bussine_id',
    ];

     public function bussine()
    {
        return $this->belongsTo(Bussine::class);
    }    

    public function scopeSearch($query,$name)
    {
        return $query->join('bussines','bussines.id','=','videos.bussine_id')
        		    ->where('bussines.name','LIKE',"%$name%")
        		    ->select('videos.*')
                            ->orderBy('created_at','desc')
        		    ->paginate(10);
    }    
}
