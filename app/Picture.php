<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
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
        return $query->join('bussines','bussines.id','=','pictures.bussine_id')
        		    ->where('bussines.name','LIKE',"%$name%")
        		    ->select('pictures.*')
                            ->orderBy('created_at','desc')
        		    ->paginate(10);
    }    

}
