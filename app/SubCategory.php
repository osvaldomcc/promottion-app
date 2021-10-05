<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class SubCategory extends Model
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
    	'name','category_id','icono','lang_id',
    ];

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }  
	   
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }    

     public function bussines()
    {
    	return $this->hasMany(Bussine::class);
    }

     public function scopeSearch($query,$name)
    {
        return $query->join('categories','categories.id','=','sub_categories.category_id')
                            ->where('categories.name','LIKE',"%$name%")
                            ->orwhere('sub_categories.name','LIKE',"%$name%")
                            ->select('sub_categories.*')
                            ->orderBy('created_at','desc')->paginate(10);
        
    }

      public function getNameAttribute($value)
        {
          return strtoupper($value);
        }
}
