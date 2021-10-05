<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Country extends Model
{

    use Sluggable;

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
    	'name','path','lang_id',
    ];

     public function lang()
    {
        return $this->belongsTo(Lang::class);
    }

    public function users()
    {
    	return $this->hasMany(User::class);
    }

    public function cities()
    {
    	return $this->hasMany(City::class);
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%")->orderBy('created_at','desc')->paginate(10);
    }

    public static function distintos($name,$lang)
    {
        return Country::whereHas('cities', function ($query) use ($name,$lang) {
                        $query->join('municipalities','municipalities.id','=','cities.id')
                                  ->join('bussines','bussines.municipality_id','=','municipalities.id')
                                  ->where('countries.name','!=',$name);
                    })->whereHas('lang', function ($query) use ($lang) {
                            $query->where('language',$lang);
                    })->get();
    }
    

   
}
