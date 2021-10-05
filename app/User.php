<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','firstname','lastname','rol','path','about','permite_email','accept_terms','country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bussines()
    {
        return $this->belongsToMany(Bussine::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }    

    public function messages()
    {
        return $this->hasMany(Comment::class);
    }    

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%")->orwhere('email','LIKE',"%$name%")->paginate(10);
    }

    public function scopebuscar($query,$name)
    {
        return $query->join('bussine_user','users.id','=','bussine_user.user_id')
                                              ->join('bussines','bussines.id','=','bussine_user.bussine_id')
                                              ->select('users.email as email','bussines.name as name','bussine_user.created_at as creado')
                                              ->where('users.email','LIKE',"%$name%")
                                              ->orwhere('bussines.name','LIKE',"%$name%")
                                              ->orderBy('bussine_user.created_at','desc')
                                              ->paginate(10);
        
    }

   

}
