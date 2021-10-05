<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Http\Requests;
use Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\PaisRequest;
use App\Http\Requests\PaisEditRequest;
use App\Lang;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries=Country::Search($request->name);
        return view('backend.countries.index')->with('countries',$countries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs=Lang::lists('language','id');
        return view('backend.countries.create')->with('langs',$langs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaisRequest $request)
    {
        $country= new Country($request->all());
      
        if($request->file('path')!=null)
        {
            $photo=$request->file('path');
            $name='imcc_pais_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/countries/'.$name));
            $country->path=$name;
        }
        $country->save();

        Flash::success('El país '.$country->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.country.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return view('backend.countries.show')->with('country',$country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $langs=Lang::lists('language','id');
        return view('backend.countries.edit')->with('country',$country)->with('langs',$langs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaisEditRequest $request, $id)
    {
        $country=Country::find($id);        
        $pathold=$country->path;
        $country->fill($request->all());
       $country->slug=$request->slug;
        if($request->file('path')!=null)
        {
               if($pathold != null){
                unlink(public_path('images\\countries\\'.$pathold));
               }

            $photo=$request->file('path');
            $name='imcc_pais_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/countries/'.$name));
            $country->path=$name;
        }
        $country->save();
        Flash::success('El país '.$country->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
         
        $pathold=$country->path;
          if($pathold != null)
            {
               unlink(public_path('images\\countries\\'.$pathold));

            }
        $country->delete();
        Flash::success('El país '.$country->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.country.index');
    }



      public function delete($country)
    {
        $lista=explode(',', $country);

        for($i=0;$i<count($lista);$i++)
        {
            $country=Country::find($lista[$i]);
            $pathold=$country->path;
           if($pathold != null)
            {
                unlink(public_path('images\\countries\\'.$pathold));
           }

            $country->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' países han sido eliminados satisfactoriamente')->important();
        }else{
            Flash::success('El país se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }


}
