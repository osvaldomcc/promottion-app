<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Bussine;
use App\Country;
use App\Municipality;
use App\City;
use App\Http\Requests;
use DB;
use Auth;
use App\User;
use App\Comment;
use Laracasts\Flash\Flash;
use App\Http\Requests\CommentCreateRequest;
use Image;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\EditImageRequest;
use App\Http\Requests\EditPasswordRequest;
use App\Http\Requests\MessageFrontRequest;
use App\Message;
use App\Like;
use App\Lang;
use Carbon\Carbon;
use Illuminate\Translation\Translator;

class FrontController extends Controller
{
	public function __construct(Translator $trans)
	{
		$this->trans=$trans;
		Carbon::setLocale(App::getLocale());	
	}

	public function home()
	{		
		$lang=App::getLocale();
		$country=Country::whereHas('lang', function ($query) use ($lang) {
                		$query->where('name','cuba')
                			->where('langs.language',$lang);
	                     })->first();
		if($country)
		{
		$categories=Bussine::SubCat($country,$lang);
		if($lang=='es')
		{
			$hotels = Bussine::Hoteles($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::Hoteles($country->name)->count();
			$restaurants = Bussine::Restaurantes($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::Restaurantes($country->name)->count();	
			$entertainments = Bussine::Entretenimientos($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::Entretenimientos($country->name)->count();
		}else{
			$hotels = Bussine::Hotels($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::Hotels($country->name)->count();	
			$restaurants = Bussine::Restaurants($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::Restaurants($country->name)->count();
			$entertainments = Bussine::Entertainments($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::Entertainments($country->name)->count();
		}
		
			
			
		$populars = Bussine::Popular($country->name,$lang)->take(8);
		$popularspartial=$populars->count();
		$popularstotal=Bussine::Popular($country->name,$lang)->count();	
		$subtitlespopulars=Bussine::Subtitles($country->name,$lang);		
		$cities=City::whereHas('country', function ($query) use ($lang) {
                		$query->join('langs','langs.id','=','countries.lang_id')
                              		->where('langs.language','=',$lang)
                			->where('countries.name','Cuba');
	                     })->get();

		$countriesdistinctcuba=Country::distintos($country->name,$lang)->take(6);
		$countriesdistinctcubapartial=$countriesdistinctcuba->count();
		$countriesdistinctcubatotal=Country::distintos($country->name,$lang)->count();
		
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.country')->with('categories',$categories)
					   ->with('country',$country)
					   ->with('hotels',$hotels)
					   ->with('hotelspartial',$hotelspartial)
					   ->with('hotelstotal',$hotelstotal)
					   ->with('restaurants',$restaurants)
					   ->with('restaurantspartial',$restaurantspartial)
					   ->with('restaurantstotal',$restaurantstotal)
					   ->with('entertainments',$entertainments)
					   ->with('entertainmentspartial',$entertainmentspartial)
					   ->with('entertainmentstotal',$entertainmentstotal)
					   ->with('populars',$populars)
					   ->with('popularspartial',$popularspartial)
					   ->with('popularstotal',$popularstotal)
					   ->with('subtitlespopulars',$subtitlespopulars)
					   ->with('cities',$cities)
					    ->with('countriesdistinctcuba',$countriesdistinctcuba)
					   ->with('countriesdistinctcubapartial',$countriesdistinctcubapartial)
					   ->with('countriesdistinctcubatotal',$countriesdistinctcubatotal)
					   ->with('banners',$banners)
					   ->with('lastnews',$lastnews);
		} else {
			abort('404');
		}
	}


	public function pais($country)
	{	
		
		$lang=App::getLocale();
		$country=Country::whereHas('lang', function ($query) use ($country,$lang) {
                		$query->where('slug',$country)
                			->where('langs.language',$lang);
	                     })->first();
		
		if($country)
		{
		$categories=Bussine::SubCat($country,$lang);
		if($lang=='es')
		{
			$hotels = Bussine::Hoteles($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::Hoteles($country->name)->count();
			$restaurants = Bussine::Restaurantes($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::Restaurantes($country->name)->count();	
			$entertainments = Bussine::Entretenimientos($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::Entretenimientos($country->name)->count();
		}else{
			$hotels = Bussine::Hotels($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::Hotels($country->name)->count();	
			$restaurants = Bussine::Restaurants($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::Restaurants($country->name)->count();
			$entertainments = Bussine::Entertainments($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::Entertainments($country->name)->count();
		}
		
			
			
		$populars = Bussine::Popular($country->name,$lang)->take(8);
		$popularspartial=$populars->count();
		$popularstotal=Bussine::Popular($country->name,$lang)->count();	
		$subtitlespopulars=Bussine::Subtitles($country->name,$lang);		
		$cities=City::whereHas('country', function ($query) use ($lang,$country) {
                		$query->join('langs','langs.id','=','countries.lang_id')
                              		->where('langs.language','=',$lang)
                			->where('countries.name',$country->name);
	                     })->get();
		$countriesdistinctcuba=Country::distintos($country->name,$lang)->take(6);
		$countriesdistinctcubapartial=$countriesdistinctcuba->count();
		$countriesdistinctcubatotal=Country::distintos($country->name,$lang)->count();

		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.country')->with('categories',$categories)
					   ->with('country',$country)
					   ->with('hotels',$hotels)
					   ->with('hotelspartial',$hotelspartial)
					   ->with('hotelstotal',$hotelstotal)
					   ->with('restaurants',$restaurants)
					   ->with('restaurantspartial',$restaurantspartial)
					   ->with('restaurantstotal',$restaurantstotal)
					   ->with('entertainments',$entertainments)
					   ->with('entertainmentspartial',$entertainmentspartial)
					   ->with('entertainmentstotal',$entertainmentstotal)
					   ->with('populars',$populars)
					   ->with('popularspartial',$popularspartial)
					   ->with('popularstotal',$popularstotal)
					   ->with('subtitlespopulars',$subtitlespopulars)
					   ->with('cities',$cities)
					    ->with('countriesdistinctcuba',$countriesdistinctcuba)
					   ->with('countriesdistinctcubapartial',$countriesdistinctcubapartial)
					   ->with('countriesdistinctcubatotal',$countriesdistinctcubatotal)
					   ->with('banners',$banners)
					   ->with('lastnews',$lastnews);
		} else {
			abort('404');
		}

		
	}


	public function ciudad($country,$city)
	{	
		$lang=App::getLocale();

		$country=City::whereHas('country', function ($query) use ($country,$city,$lang) {
		               	 $query->join('langs','langs.id','=','countries.lang_id')
                  				->where('langs.language','=',$lang)
		               	 	->where('countries.slug','=',$country)
		               	 	->where('cities.slug','=',$city);
			            })->get()->first();
		if($country)
		{
		$categories=Bussine::SubCategoria($country,$lang);
		if($lang=='es')
		{
			$hotels = Bussine::HotelesCity($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::HotelesCity($country->name)->count();
			$restaurants = Bussine::RestaurantesCity($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::RestaurantesCity($country->name)->count();	
			$entertainments = Bussine::EntretenimientosCity($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::EntretenimientosCity($country->name)->count();
		}else{
			$hotels = Bussine::HotelsCity($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::HotelsCity($country->name)->count();	
			$restaurants = Bussine::RestaurantsCity($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::RestaurantsCity($country->name)->count();
			$entertainments = Bussine::EntertainmentsCity($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::EntertainmentsCity($country->name)->count();
		}

		$populars = Bussine::PopularCity($country->name,$lang)->take(8);
		$popularspartial=$populars->count();
		$popularstotal=Bussine::PopularCity($country->name,$lang)->count();	
		$subtitlespopulars=Bussine::SubtitlesCity($country->name,$lang);	
		$cities=Municipality::whereHas('city', function ($query) use ($lang,$country) {
                		$query->join('countries','countries.id','=','cities.country_id')
                			->join('langs','langs.id','=','countries.lang_id')
                  			->where('langs.language','=',$lang)
                			->where('cities.name',$country->name);
	                     })->get();
		$countriesdistinctcuba=Country::distintos($country->name,$lang)->take(6);
		$countriesdistinctcubapartial=$countriesdistinctcuba->count();
		$countriesdistinctcubatotal=Country::distintos($country->name,$lang)->count();
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();

		return view('frontend.country')->with('categories',$categories)
					   ->with('country',$country)
					   ->with('hotels',$hotels)
					   ->with('hotelspartial',$hotelspartial)
					   ->with('hotelstotal',$hotelstotal)
					   ->with('restaurants',$restaurants)
					   ->with('restaurantspartial',$restaurantspartial)
					   ->with('restaurantstotal',$restaurantstotal)
					   ->with('entertainments',$entertainments)
					   ->with('entertainmentspartial',$entertainmentspartial)
					   ->with('entertainmentstotal',$entertainmentstotal)
					   ->with('populars',$populars)
					   ->with('popularspartial',$popularspartial)
					   ->with('popularstotal',$popularstotal)
					   ->with('subtitlespopulars',$subtitlespopulars)
					   ->with('cities',$cities)
					    ->with('countriesdistinctcuba',$countriesdistinctcuba)
					   ->with('countriesdistinctcubapartial',$countriesdistinctcubapartial)
					   ->with('countriesdistinctcubatotal',$countriesdistinctcubatotal)
					   ->with('banners',$banners)
					   ->with('lastnews',$lastnews);
		} else {
			abort('404');
		}

		
	}


	

	public function municipio($country,$city,$municipality)
	{	
		$lang=App::getLocale();
		$country=Municipality::whereHas('city', function ($query) use ($country,$city,$municipality,$lang) {
		               	 $query->join('countries','countries.id','=','cities.country_id')
		               	 	->join('langs','langs.id','=','countries.lang_id')
                  				->where('langs.language','=',$lang)
		               	 	->where('countries.slug','=',$country)
		               	 	->where('cities.slug','=',$city)
		               	 	->where('municipalities.slug','=',$municipality);
			            })->get()->first();

		if($country)
		{
		$categories=Bussine::SubCategoriaM($country,$lang);
		if($lang=='es')
		{
			$hotels = Bussine::HotelesMuni($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::HotelesMuni($country->name)->count();
			$restaurants = Bussine::RestaurantesMuni($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::RestaurantesMuni($country->name)->count();	
			$entertainments = Bussine::EntretenimientosMuni($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::EntretenimientosMuni($country->name)->count();
		}else{
			$hotels = Bussine::HotelsMuni($country->name)->take(8);
			$hotelspartial=$hotels->count();
			$hotelstotal=Bussine::HotelsMuni($country->name)->count();	
			$restaurants = Bussine::RestaurantsMuni($country->name)->take(6);
			$restaurantspartial=$restaurants->count();
			$restaurantstotal=Bussine::RestaurantsMuni($country->name)->count();
			$entertainments = Bussine::EntertainmentsMuni($country->name)->take(6);
			$entertainmentspartial=$entertainments->count();
			$entertainmentstotal=Bussine::EntertainmentsMuni($country->name)->count();
		}

		$populars = Bussine::PopularMuni($country->name,$lang)->take(8);
		$popularspartial=$populars->count();
		$popularstotal=Bussine::PopularMuni($country->name,$lang)->count();	
		$subtitlespopulars=Bussine::SubtitlesMuni($country->name,$lang);	
		$cities=Municipality::whereHas('city', function ($query) use ($country,$lang) {
                		$query->join('countries','countries.id','=','cities.country_id')
	               	 	->join('langs','langs.id','=','countries.lang_id')
          				->where('langs.language','=',$lang)
                			->where('municipalities.name',$country->name);
	                     })->get();
		$countriesdistinctcuba=Country::distintos($country->name,$lang)->take(6);
		$countriesdistinctcubapartial=$countriesdistinctcuba->count();
		$countriesdistinctcubatotal=Country::distintos($country->name,$lang)->count();
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();	                     
		return view('frontend.country')->with('categories',$categories)
					   ->with('country',$country)
					   ->with('hotels',$hotels)
					   ->with('hotelspartial',$hotelspartial)
					   ->with('hotelstotal',$hotelstotal)
					   ->with('restaurants',$restaurants)
					   ->with('restaurantspartial',$restaurantspartial)
					   ->with('restaurantstotal',$restaurantstotal)
					   ->with('entertainments',$entertainments)
					   ->with('entertainmentspartial',$entertainmentspartial)
					   ->with('entertainmentstotal',$entertainmentstotal)
					   ->with('populars',$populars)
					   ->with('popularspartial',$popularspartial)
					   ->with('popularstotal',$popularstotal)
					   ->with('subtitlespopulars',$subtitlespopulars)
					   ->with('cities',$cities)
					   ->with('countriesdistinctcuba',$countriesdistinctcuba)
					   ->with('countriesdistinctcubapartial',$countriesdistinctcubapartial)
					   ->with('countriesdistinctcubatotal',$countriesdistinctcubatotal)
					   ->with('banners',$banners)
					   ->with('lastnews',$lastnews);
		} else {
			abort('404');
		}

		
	}


	public function search(Request $request)
	{
		$lang=App::getLocale();
		$paises = Country::whereHas('lang', function ($query) use ($request,$lang) {
                		$query->where('countries.name','LIKE',"%$request->name%")
                			->where('language',$lang);
	                     })->get();
		$ciudades = City::whereHas('lang', function ($query) use ($request,$lang) {
                		$query->where('cities.name','LIKE',"%$request->name%")
                			->where('language',$lang);
	                     })->get();
		$municipios = Municipality::whereHas('lang', function ($query) use ($request,$lang) {
                		$query->where('municipalities.name','LIKE',"%$request->name%")
                			->where('language',$lang);
	                     })->get();
		$ver=$paises->merge($ciudades)->merge($municipios);
		$responses=$ver->unique()->take(6);
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.search')->with('responses',$responses)
						 ->with('banners',$banners)
						 ->with('lastnews',$lastnews);
	}

	public function bussine($country,$city,$municipality,$bussine)
	{
	     $lang=App::getLocale();
	     $pais=Country::where('slug',$country)->first();
	     $ciudad=City::where('slug',$city)->first();
	     $muni=Municipality::where('slug',$municipality)->first();
	     $negocio=Bussine::whereHas('lang', function ($query) use ($bussine,$lang) {
                		$query->where('slug',$bussine)
                			->where('langs.language',$lang);
	                     })->first();

	     if(!$pais or !$ciudad or !$muni or !$negocio )
	     {
	     	abort(404);
	     }
	     
	   $bussine=Bussine::whereHas('municipality', function ($query) use ($lang,$pais,$ciudad,$muni,$negocio) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                           ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                          ->where('countries.slug','=',$pais->slug)
                          ->where('cities.slug','=',$ciudad->slug)
                          ->where('municipalities.slug','=',$muni->slug)
                          ->where('bussines.slug','=',$negocio->slug);
	                })->get()->first();

	                

	     	if(!$bussine)
	     	{
	     		abort(404);
	     	}

	    $others=Bussine::whereHas('municipality', function ($query) use ($lang,$pais,$negocio) {
                $query->join('cities','cities.id','=','municipalities.city_id')
                          ->join('countries','countries.id','=','cities.country_id')
                          ->join('langs','langs.id','=','countries.lang_id')
                          ->where('langs.language','=',$lang)
                          ->where('countries.slug','=',$pais->slug)
                          ->where('bussines.slug','!=',$negocio->slug);
	                })->whereHas('subcategory', function ($query) use ($negocio) {
                		$query->where('id',$negocio->subcategory->id);
	                })->inRandomOrder()->take(8)->get();

                if(!$others)
	     	{
	     		abort(404);
	     	}
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();

		

		return view('frontend.description')->with('bussine',$bussine)
						      ->with('lastnews',$lastnews)
						      ->with('others',$others);
						
		
	}

	

	public function commentbussine($id,Request $request)
	{
		if($request->ajax())
		{
			$comments=Comment::where('bussine_id',$id)->orderBy('created_at','Desc')->paginate(3);
			return view('frontend.agregate')->with('comments',$comments);
		}
	}

		
	public function categorycountry($pais,$subcategory)
	{
		$lang=App::getLocale();
			
		     $country=Country::whereHas('lang', function ($query) use ($lang,$pais) {
	            		$query->where('slug',$pais)
	            			->where('langs.language',$lang);
	                     })->first();


		if(!$country)
		{
		    $country=City::whereHas('lang', function ($query) use ($lang,$pais) {
                		$query->where('slug',$pais)
                			->where('langs.language',$lang);
	                     })->first();
		}

		

		if(!$country)
		{
		    
		    $country=Municipality::whereHas('lang', function ($query) use ($lang,$pais) {
                		$query->where('slug',$pais)
                			->where('langs.language',$lang);
	                     })->first();
		}

		     $sub=SubCategory::where('slug',$subcategory)->first();

		     if(!$country or !$sub)
		     {
		     	abort(404);
		     }

		
			

		$resultados=Bussine::whereHas('municipality', function ($query) use ($country,$lang) {
		               	 $query->join('cities','cities.id','=','municipalities.city_id')
			                          ->join('countries','countries.id','=','cities.country_id')
			                           ->join('langs','langs.id','=','countries.lang_id')
                      			      	->where('langs.language','=',$lang)
			                          ->where('countries.name','=',$country->name)
			                          ->orwhere('cities.name','=',$country->name)
                          			    ->orwhere('municipalities.name','=',$country->name);
			            })->whereHas('subcategory', function ($query) use ($sub) {
			                $query->where('name','=',$sub->name);
			            })->orderBy('created_at','DESC')->paginate(9);


		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
	

		$subcategory=SubCategory::where('name',$sub->name)->first();

		if(!$country)
		{
		    abort(404);
		}

		if(!$subcategory)
		{
		    abort(404);
		}
		
		if($country->country)
		{
		    $categories=Bussine::SubCategoria($country,$lang);
		}elseif($country->city)
		{
		   $categories=Bussine::SubCategoriaM($country,$lang);
		}else{
		   $categories=Bussine::SubCat($country,$lang);
		}

		return view('frontend.categorycountry')->with('categories',$categories)
						             ->with('lastnews',$lastnews)
						             ->with('banners',$banners)
						             ->with('resultados',$resultados)
						             ->with('country',$country)
						             ->with('subcategory',$subcategory);
	}

	public function paises()
	{
		$lang=App::getLocale();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		
		$paises=Country::whereHas('lang', function ($query) use ($lang) {
                		$query->where('langs.language',$lang);
	                     })->paginate(9);
		return view('frontend.paises')->with('lastnews',$lastnews)
					    	->with('banners',$banners)
					    	->with('paises',$paises);
	}

	

	public function populares($country)
	{
		$lang=App::getLocale();
		$paises = Country::where('slug','=',$country)->get();
		$ciudades = City::where('slug','=',$country)->get();
		$municipios = Municipality::where('slug','=',$country)->get();	
		$country=$paises->merge($ciudades)->merge($municipios)->first();
		if(!$country)
		{
			abort(404);
		}
		$populars = Bussine::whereHas('municipality', function ($query) use ($lang,$country) {
			                $query->join('cities','cities.id','=','municipalities.city_id')
			                          ->join('countries','countries.id','=','cities.country_id')
			                          ->join('langs','langs.id','=','countries.lang_id')
                              			     ->where('langs.language','=',$lang)
			                          ->where('countries.name','=',$country->name);
				                })->has('comments','>=',10)->paginate(9);

		$categories=Bussine::SubCat($country,$lang);
		$banners=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->inRandomOrder()->get();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		
		return view('frontend.populares')->with('categories',$categories)
						    ->with('lastnews',$lastnews)
						    ->with('banners',$banners)
						    ->with('populars',$populars)
						    ->with('country',$country);
						    
	}

	public function perfil()
	{
		$lang=App::getLocale();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();

		$bussines=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(10)->get();

		$user=Auth::user();
		if(!$user)
		{
			abort(404);
		}
		$c=0;
		$porciento=0;
		$nombre=$user->name;
		$primerap=$user->firstname;
		$segundoapp=$user->lastname;
		$sobre=$user->about;
		$path=$user->path;

		if($nombre != null)
		{	
			$c++;
		}

		if($primerap != null)
		{	
			$c++;
		}

		if($segundoapp != null)
		{	
			$c++;
		}

		if($sobre != null)
		{	
			$c++;
		}

		if($path != 'default.jpg')
		{	
			$c++;
		}

		$porciento=$c*100/5;

		$populars = Bussine::PopularFull($lang)->take(6);
		$cantpopulars=count($populars);
		$cantbussines=count($bussines);

		return view('frontend.profile')->with('lastnews',$lastnews)
						->with('user',$user)
						->with('populars',$populars)
						->with('cantpopulars',$cantpopulars)
						->with('cantbussines',$cantbussines)
						->with('porciento',$porciento)
						->with('bussines',$bussines);
	}
	
	public function commentcreate(CommentCreateRequest $request)
	{

		if($request->ajax())
		{
			$var=Lang::where('language',App::getLocale())->first();
			if(!$var)
			{
				abort(404);
			}
			$comment = new Comment($request->all());
			$comment->like=0;
			$comment->lang_id=$var->id;
			$comment->user()->associate($request->user());
			$comment->save();
		}
	}

	public function agregar(Bussine $bussine,Request $request)
	{	
		$user=Auth::user();
		$bussine=Bussine::where('id',$bussine->id)->first();
		$user=User::where('id',$user->id)->first();
		if(!$bussine or !$user)
		{
			abort(404);
		}
		if($user->name != $request->user()->name)
		{
			return redirect()->back();
		}

		$variable= DB::table('bussine_user')->join('bussines','bussines.id','=','bussine_user.bussine_id')
							->where('user_id',$user->id)
							->where('bussines.slug',$bussine->slug)
							->count();
		if($variable>0)
		{
			$message=$this->trans->trans('app.api.already');
			Flash::error($message.' '.$user->name)->important();
			return redirect()->back();
		}

		DB::table('bussine_user')->insert([
				'user_id' => $user->id,
				'bussine_id' => $bussine->id,
			]);
			
		$message=$this->trans->trans('app.api.addmarcador');
		
		Flash::success($bussine->name.' '.$message.' '.$user->name)->important();
		return redirect()->back();

	}

	public function imprimir()
	{
		return view('frontend.print');
	}

	public function imprimirpriv()
	{
		return view('frontend.printpriv');
	}

	public function marcadores()
	{	
		$lang=App::getLocale();
		$user=Auth::user();
		if(!$user)
		{
			abort(404);
		}
		$c=0;
		$porciento=0;
		$nombre=$user->name;
		$primerap=$user->firstname;
		$segundoapp=$user->lastname;
		$sobre=$user->about;
		$path=$user->path;

		if($nombre != null)
		{	
			$c++;
		}

		if($primerap != null)
		{	
			$c++;
		}

		if($segundoapp != null)
		{	
			$c++;
		}

		if($sobre != null)
		{	
			$c++;
		}

		if($path != 'default.jpg')
		{	
			$c++;
		}

		$porciento=$c*100/5;
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		$marks=Bussine::Marks($user->id);
		return view('frontend.marcadores')->with('marks',$marks)
					       	        ->with('user',$user)
					       	        ->with('porciento',$porciento)
					       	        ->with('lastnews',$lastnews);
	}

	public function comentarios()
	{	
		$lang=App::getLocale();
		$user=Auth::user();
		if(!$user)
		{
			abort(404);
		}
		$c=0;
		$porciento=0;
		$nombre=$user->name;
		$primerap=$user->firstname;
		$segundoapp=$user->lastname;
		$sobre=$user->about;
		$path=$user->path;

		if($nombre != null)
		{	
			$c++;
		}

		if($primerap != null)
		{	
			$c++;
		}

		if($segundoapp != null)
		{	
			$c++;
		}

		if($sobre != null)
		{	
			$c++;
		}

		if($path != 'default.jpg')
		{	
			$c++;
		}

		$porciento=$c*100/5;
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		$comments=Comment::where('user_id',$user->id)->orderBy('created_at','DESC')->paginate(10);
		return view('frontend.comentarios')->with('comments',$comments)
					       	        ->with('user',$user)
					       	        ->with('porciento',$porciento)
					       	        ->with('lastnews',$lastnews);
	}

	public function configuracion()
	{	
		$lang=App::getLocale();
		$user=Auth::user();
		if(!$user)
		{
			abort(404);
		}
		$c=0;
		$porciento=0;
		$nombre=$user->name;
		$primerap=$user->firstname;
		$segundoapp=$user->lastname;
		$sobre=$user->about;
		$path=$user->path;

		if($nombre != null)
		{	
			$c++;
		}

		if($primerap != null)
		{	
			$c++;
		}

		if($segundoapp != null)
		{	
			$c++;
		}

		if($sobre != null)
		{	
			$c++;
		}

		if($path != 'default.jpg')
		{	
			$c++;
		}

		$porciento=$c*100/5;
		
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		
		return view('frontend.conf')->with('user',$user)
					        ->with('porciento',$porciento)
				       	        ->with('lastnews',$lastnews);
	}

	public function edituser(User $user,EditUserRequest $request)
	{
		if(!$user)
		{
			abort(404);
		}
		$user->update($request->all());
		
		 if($user->permite_email == 1)
		        {
		         $user->permite_email=1;
		        }else{
		            $user->permite_email=0;
		        }

		        if($user->accept_terms == 1)
		        {
		         $user->accept_terms=1;
		        }else{
		            $user->accept_terms=0;
		        }
		        $user->save();
		 
		 $message=$this->trans->trans('app.api.theuser');
		$messagedos=$this->trans->trans('app.api.editeduser');
		Flash::success($message.' '.$user->name.' '.$messagedos)->important();
		return redirect()->back();
	}

	public function editimage(User $user,EditImageRequest $request)
	{
		if(!$user)
		{
			abort(404);
		}
		$pathold=$user->path;
		$user->fill($request->all());
		  if($request->file('path')!=null)
		        {
		            if($pathold != 'default.jpg')
		            {
		               unlink(public_path('images\\avatars\\'.$pathold));

		            }

		            $photo=$request->file('path');
		            $name='imcc_'.time().'.'.$photo->getClientOriginalExtension();
		            Image::make($photo)->resize('460','700')->save(public_path('images/avatars/'.$name));
		            $user->path=$name;
		        }


		$user->save();
		$message=$this->trans->trans('app.api.theuser');
		$messagedos=$this->trans->trans('app.api.editeduser');
		Flash::success($message.' '.$user->name.' '.$messagedos)->important();
		return redirect()->back();
	}

	public function editpassword(User $user,EditPasswordRequest $request)
	{
		$passwordold=$user->password;
	         	$user->password=bcrypt($request->password);
		$user->save();
		$message=$this->trans->trans('app.api.chpass');
		Flash::success($message)->important();
		return redirect()->back();

	}

	public function elimmark(Bussine $bussine)
	{
		$user=Auth::user();
		if(!$user or !$bussine)
		{
			abort(404);
		}
		Bussine::Elimmark($user,$bussine);

		$message=$this->trans->trans('app.api.elmark');
		$messagedos=$this->trans->trans('app.api.elimmarcador');
		Flash::success($message.' '.$bussine->name.' '.$messagedos)->important();

		return redirect()->back();
	}


	public function verperfil(User $user)
	{
		$lang=App::getLocale();
		if(Auth::guest())
		{
		 abort(404);
		}
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.message')->with('user',$user)
						   ->with('lastnews',$lastnews);
	}

	public function enviarmensaje(MessageFrontRequest $request)
	{
		$message= new Message($request->all());
		$message->comenter=$request->comenter;
		$message->readed=0;
		$message->save();
		$messagenuevo=$this->trans->trans('app.api.sentsuccess');		
		Flash::success($messagenuevo)->important();
	 	return redirect()->back();

	}


	public function vermensajes()
	{
		$lang=App::getLocale();
		$user=Auth::user();
		if(!$user)
		{
			abort(404);
		}

		$mensajes=Message::where('comenter',$user->id)->orderBy('created_at','DESC')->paginate(10);

		$c=0;
		$porciento=0;
		$nombre=$user->name;
		$primerap=$user->firstname;
		$segundoapp=$user->lastname;
		$sobre=$user->about;
		$path=$user->path;

		if($nombre != null)
		{	
			$c++;
		}

		if($primerap != null)
		{	
			$c++;
		}

		if($segundoapp != null)
		{	
			$c++;
		}

		if($sobre != null)
		{	
			$c++;
		}

		if($path != 'default.jpg')
		{	
			$c++;
		}

		$porciento=$c*100/5;
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.mismensajes')->with('user',$user)
						         ->with('porciento',$porciento)
						         ->with('lastnews',$lastnews)
						         ->with('mensajes',$mensajes);

	}



	public function elimmessage(Message $message)
	{
		$message->delete();
		$messagenuevo=$this->trans->trans('app.api.elimsuccess');		
		Flash::success($messagenuevo)->important();
	 	return redirect()->back();
	}

	public function like(Request $request,Comment $comment)
	{	

		if($request->ajax())
		{
			$user=Auth::user();			
			if(!$user or !$comment)
			{
				abort(404);
			}

			$like = DB::table('likes')->where('comment_id',$comment->id)
			 		 	  ->where('user_id',$user->id)
			 		 	  ->get();
			 if(!$like)
			 {
			 	$like= new Like();
			 	$like->comment()->associate($comment);
			 	$like->user()->associate($user);
			 	$like->like=1;
			 	$like->save();
			 }else{

			 	$cant=DB::table('likes')->where('comment_id',$comment->id)
		 		 	  ->where('user_id',$user->id)
		 		 	  ->where('like',0)
		 		 	  ->count();
			
				 if($cant==1)
				 {
				 	DB::table('likes')->where('comment_id',$comment->id)
				 		 	  ->where('user_id',$user->id)
				 		 	  ->where('like',0)
				 		 	  ->update(['like'=>1]);
				 }

			 }

			 
		}
		
	}

	public function dislike(Request $request,Comment $comment)
	{	

		if($request->ajax())
		{
			$user=Auth::user();
			if(!$user or !$comment)
			{
				abort(404);
			}
			$like = DB::table('likes')->where('comment_id',$comment->id)
			 		 	  ->where('user_id',$user->id)
			 		 	  ->where('like',1)
			 		 	  ->count();
			 if($like==1)
			 {
			 	DB::table('likes')->where('comment_id',$comment->id)
			 		 	  ->where('user_id',$user->id)
			 		 	  ->where('like',1)
			 		 	  ->update(['like'=>0]);
			 }

		}
		
	}


	public function contacto()
	{
		$lang=App::getLocale();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.contact')->with('lastnews',$lastnews);
	}

	public function contactoform(ContactRequest $request)
	{	
		$body=$request->body.'~'.$request->correo;
		$message= new Message();
		$message->readed=0;
		$message->comenter=1;
		$message->user_id=1;
		$message->body=$body;
		$message->save();
		Flash::success('El mensaje ha sido enviado satisfactoriamente')->important();
		return redirect()->back();
	}

	public function videos(Bussine $bussine)
	{
		$lang=App::getLocale();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.videos')->with('bussine',$bussine)
						->with('lastnews',$lastnews);
	}

	public function imagenes(Bussine $bussine)
	{
		$lang=App::getLocale();
		$lastnews=Bussine::whereHas('lang', function ($query) use ($lang) {
                		$query->where('banner',1)
                			->where('langs.language',$lang);
	                     })->orderBy('created_at','Desc')->take(4)->get();
		return view('frontend.imagenes')->with('bussine',$bussine)
						->with('lastnews',$lastnews);
	}
}