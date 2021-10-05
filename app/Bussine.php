<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Bussine;
use Cviebrock\EloquentSluggable\Sluggable;

class Bussine extends Model
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
    	'name','slogan','ranking','address','description','characteristics','municipality_id','subcategory_id','banner','lang_id','logo',
    ];

    public function lang()
    {
        return $this->belongsTo(Lang::class);
    }    

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }    

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }    

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }    

     public function comments()
    {
        return $this->hasMany(Comment::class);
    }    

     public function videos()
    {
        return $this->hasMany(Video::class);
    }    

     public function pictures()
    {
        return $this->hasMany(Picture::class);
    }    

     public function scopeSearch($query,$name)
    {
        return $query->where('name','LIKE',"%$name%")->orderBy('created_at','desc')->paginate(10);
    }
    
    public static function Hoteles($country)
    {

       return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('countries.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','hoteles');
            })->orderBy('created_at','DESC')->get();
           
    }          

      public static function Hotels($country)
    {

       return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('countries.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','hotels');
            })->orderBy('created_at','DESC')->get();
           
    }          

    public static function Restaurantes($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('countries.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','restaurantes');
            })->orderBy('created_at','DESC')->get();
           
    }           

     public static function Restaurants($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('countries.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','restaurants');
            })->orderBy('created_at','DESC')->get();
           
    }           

    public static function Entretenimientos($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('countries.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','entretenimientos');
            })->orderBy('created_at','DESC')->get();
           
    }       

    public static function Entertainments($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('countries.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','entertainments');
            })->orderBy('created_at','DESC')->get();
           
    }       


    public static function HotelesCity($country)
    {

       return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('cities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','hoteles');
            })->orderBy('created_at','DESC')->get();
           
    }          

      public static function HotelsCity($country)
    {

       return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('cities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','hotels');
            })->orderBy('created_at','DESC')->get();
           
    }          

    public static function RestaurantesCity($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('cities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','restaurantes');
            })->orderBy('created_at','DESC')->get();
           
    }           

     public static function RestaurantsCity($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('cities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','restaurants');
            })->orderBy('created_at','DESC')->get();
           
    }           

    public static function EntretenimientosCity($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('cities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','entretenimientos');
            })->orderBy('created_at','DESC')->get();
           
    }       

    public static function EntertainmentsCity($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('cities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','entertainments');
            })->orderBy('created_at','DESC')->get();
           
    } 


    public static function HotelesMuni($country)
    {

       return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('municipalities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','hoteles');
            })->orderBy('created_at','DESC')->get();
           
    }          

      public static function HotelsMuni($country)
    {

       return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('municipalities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','hotels');
            })->orderBy('created_at','DESC')->get();
           
    }          

    public static function RestaurantesMuni($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('municipalities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','restaurantes');
            })->orderBy('created_at','DESC')->get();
           
    }           

     public static function RestaurantsMuni($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('municipalities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','restaurants');
            })->orderBy('created_at','DESC')->get();
           
    }           

    public static function EntretenimientosMuni($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('municipalities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','entretenimientos');
            })->orderBy('created_at','DESC')->get();
           
    }       

    public static function EntertainmentsMuni($country)
    {

      return Bussine::whereHas('municipality', function ($query) use ($country) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->where('municipalities.name','=',$country);
            })->whereHas('subcategory', function ($query) {
                $query->where('name','=','entertainments');
            })->orderBy('created_at','DESC')->get();
           
    } 


    public static function Popular($country,$lang)
    {
        $bussines = Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                         ->where('countries.name','=',$country);
                })->orderBy('created_at','DESC')->get();
                
                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i];
                }
          }

          return collect($resultado)->sortByDesc('comments');
    }       

     public static function PopularCity($country,$lang)
    {
        $bussines = Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                          ->where('cities.name','=',$country);
                })->orderBy('created_at','DESC')->get();
                
                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i];
                }
          }

          return collect($resultado)->sortByDesc('comments');
    }       

     public static function PopularMuni($country,$lang)
    {
        $bussines = Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                          ->where('municipalities.name','=',$country);
                })->orderBy('created_at','DESC')->get();
                
                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i];
                }
          }

          return collect($resultado)->sortByDesc('comments');
    }       

     public static function Subtitles($country,$lang)
    {
        $bussines = Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                        ->where('countries.name','=',$country);
                })->orderBy('created_at','DESC')->get();

                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i]->subcategory->category->name;
                }
          }
          
          return collect($resultado)->take(8)->unique();
    }       


     public static function SubtitlesCity($country,$lang)
    {
        $bussines = Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                          ->where('cities.name','=',$country);
                })->orderBy('created_at','DESC')->get();

                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i]->subcategory->category->name;
                }
          }
          
          return collect($resultado)->take(8)->unique();
    }       


     public static function SubtitlesMuni($country,$lang)
    {
        $bussines = Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                          ->where('municipalities.name','=',$country);
                })->orderBy('created_at','DESC')->get();

                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i]->subcategory->category->name;
                }
          }
          
          return collect($resultado)->take(8)->unique();
    }       

    public function getCharacteristics()
    {
      return explode(';',$this->characteristics);
    }


    public static function PopularFull($lang)
    {
                $bussines=Bussine::whereHas('lang', function ($query) use ($lang) {
                    $query->where('langs.language',$lang);
                       })->get();

                $resultado=array();

          for ($i=0; $i <count($bussines) ; $i++) { 
                if($bussines[$i]->comments->count()>=10)
                {
                  $resultado[$i]=$bussines[$i];
                }
          }
          return collect($resultado)->sortByDesc('comments');
    }       

     public function scopeMarks($query,$user)
    {
      return $query->join('bussine_user','bussine_user.bussine_id','=','bussines.id')
                         ->join('users','bussine_user.user_id','=','users.id')
                         ->select('bussines.*')
                         ->where('bussine_user.user_id',$user)
                         ->orderBy('bussine_user.id','DESC')
                         ->paginate(6);
    }


     public static function Elimmark($user,$bussine)
    {
      return DB::table('bussine_user')->where('bussine_user.user_id',$user->id)
                                                    ->where('bussine_user.bussine_id',$bussine->id)
                                                    ->select('bussine_user.*')
                                                    ->delete();
    }


    public static function SubCat($country,$lang){  

          $bussines= Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                    $query->join('cities','cities.id','=','municipalities.city_id')
                              ->join('countries','countries.id','=','cities.country_id')
                              ->join('langs','langs.id','=','countries.lang_id')
                              ->where('langs.language','=',$lang)
                              ->where('countries.name','=',$country->name);
                })->get();

          $subcategories=array();

          for($i=0;$i<count($bussines);$i++)
          {
            $subcategories[$i]=$bussines[$i]->subcategory->category;
          }

          return collect($subcategories)->unique();

    }

     public static function SubCategoria($country,$lang){  

          $bussines= Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                    $query->join('cities','cities.id','=','municipalities.city_id')
                              ->join('countries','countries.id','=','cities.country_id')
                              ->join('langs','langs.id','=','countries.lang_id')
                              ->where('langs.language','=',$lang)
                              ->where('cities.name','=',$country->name);
                })->get();
            
          $subcategories=array();

          for($i=0;$i<count($bussines);$i++)
          {
            $subcategories[$i]=$bussines[$i]->subcategory->category;
          }

          return collect($subcategories)->unique();

    }

     public static function SubCategoriaM($country,$lang){  

          $bussines= Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
                    $query->join('cities','cities.id','=','municipalities.city_id')
                              ->join('countries','countries.id','=','cities.country_id')
                              ->join('langs','langs.id','=','countries.lang_id')
                              ->where('langs.language','=',$lang)
                              ->where('municipalities.name','=',$country->name);
                })->get();
            
          $subcategories=array();

          for($i=0;$i<count($bussines);$i++)
          {
            $subcategories[$i]=$bussines[$i]->subcategory->category;
          }

          return collect($subcategories)->unique();

    }

}
