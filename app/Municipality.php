<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;

class Municipality extends Model
{
     use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }

     protected $fillable = [
    	'name','path','city_id','lang_id',
    ];

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function bussines()
    {
    	return $this->hasMany(Bussine::class);
    }

     public function scopeSearch($query,$name)
    {
        return $query->join('cities','cities.id','=','municipalities.city_id')
                            ->where('municipalities.name','LIKE',"%$name%")
                            ->orwhere('cities.name','LIKE',"%$name%")
                            ->select('municipalities.*')
                            ->orderBy('municipalities.created_at','desc')->paginate(10);
    }

    

}
