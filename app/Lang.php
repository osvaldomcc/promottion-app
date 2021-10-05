<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    protected $fillable = [
    	'language',
    ];

    public function bussines()
    {
    	return $this->hasMany(Bussine::class);
    }

    public function categories()
    {
    	return $this->hasMany(Category::class);
    }

    public function cities()
    {
    	return $this->hasMany(City::class);
    }

     public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function countries()
    {
        return $this->hasMany(Country::class);
    }   

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }   

    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }  


}
