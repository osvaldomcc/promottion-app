<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class City extends Model
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
    	'name','path','country_id','lang_id',
    ];

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

     public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%")->orderBy('created_at','desc')->paginate(10);
    }

      
}
