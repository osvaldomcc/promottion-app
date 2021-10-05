<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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
    	'name','icono','lang_id',
    ];

    public function lang()
    {
       return $this->belongsTo(Lang::class);
    }

     public function subcategories()
    {
    	return $this->hasMany(SubCategory::class);
    }


    public function scopeSearch($query,$name)
    {
    	return $query->where('name','LIKE',"%$name%")->orderBy('created_at','desc')->paginate(10);
    }

      public function getNameAttribute($value)
        {
          return strtoupper($value);
        }
   
}
