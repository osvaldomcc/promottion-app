<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Http\Requests;
use App\Country;
use App\Lang;
use Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\CiudadRequest;
use App\Http\Requests\CiudadEditRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $cities=City::Search($request->name);
        return view('backend.cities.index')->with('cities',$cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.cities.create')->with('countries',$countries)->with('langs',$langs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CiudadRequest $request)
    {
        $city= new City($request->all());
      
        if($request->file('path')!=null)
        {
            $photo=$request->file('path');
            $name='imcc_ciudad_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/cities/'.$name));
            $city->path=$name;
        }
        $city->save();

        Flash::success('La ciudad '.$city->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('backend.cities.show')->with('city',$city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $countries=Country::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.cities.edit')->with('city',$city)->with('countries',$countries)->with('langs',$langs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CiudadEditRequest $request, $id)
    {        
         $city=City::find($id);
        $pathold=$city->path;
        $city->fill($request->all());
       $city->slug=$request->slug;
        if($request->file('path')!=null)
        {
               if($pathold != null){
                unlink(public_path('images\\cities\\'.$pathold));
               }

            $photo=$request->file('path');
            $name='imcc_ciudad_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/cities/'.$name));
            $city->path=$name;
        }
        $city->save();
        Flash::success('La ciudad '.$city->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
           $pathold=$city->path;
          if($pathold != null)
            {
               unlink(public_path('images\\cities\\'.$pathold));

            }
        $city->delete();
        Flash::success('La ciudad '.$city->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.city.index');
    }

     public function delete($city)
    {
        $lista=explode(',', $city);

        for($i=0;$i<count($lista);$i++)
        {
            $city=City::find($lista[$i]);
            $pathold=$city->path;
           if($pathold != null)
            {
                unlink(public_path('images\\cities\\'.$pathold));
           }

            $city->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Las '.$cantidad.' ciudades han sido eliminadas satisfactoriamente')->important();
        }else{
            Flash::success('La ciudad se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }
}
