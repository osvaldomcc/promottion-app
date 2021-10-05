<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipality;
use App\City;
use App\Lang;
use App\Http\Requests;
use Image;
use Laracasts\Flash\Flash;
use App\Http\Requests\MunicicpioRequest;
use App\Http\Requests\MunicicpioEditRequest;

class MunicipalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $municipalities=Municipality::Search($request->name);
        return view('backend.municipalities.index')->with('municipalities',$municipalities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.municipalities.create')->with('cities',$cities)->with('langs',$langs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicicpioRequest $request)
    {
        $municipality= new Municipality($request->all());
        
        if($request->file('path')!=null)
        {
            $photo=$request->file('path');
            $name='imcc_municipio_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/municipalities/'.$name));
            $municipality->path=$name;
        }
        $municipality->save();

        Flash::success('El municipio '.$municipality->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.municipality.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {
        return view('backend.municipalities.show')->with('municipality',$municipality);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipality $municipality)
    {
        $cities=City::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.municipalities.edit')->with('municipality',$municipality)->with('cities',$cities)->with('langs',$langs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MunicicpioEditRequest $request, Municipality $municipality)
    {
        
        $pathold=$municipality->path;
        $municipality->fill($request->all());
        $municipality->slug=$request->slug;
        if($request->file('path')!=null)
        {
               if($pathold != null){
                unlink(public_path('images\\municipalities\\'.$pathold));
               }

            $photo=$request->file('path');
            $name='imcc_municipio_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/municipalities/'.$name));
            $municipality->path=$name;
        }
        $municipality->save();
        Flash::success('El municipio '.$municipality->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.municipality.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
           $pathold=$municipality->path;
          if($pathold != null)
            {
               unlink(public_path('images\\municipalities\\'.$pathold));

            }
        $municipality->delete();
        Flash::success('El municipio '.$municipality->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.municipality.index');
    }

    public function delete($municipality)
    {
        $lista=explode(',', $municipality);

        for($i=0;$i<count($lista);$i++)
        {
            $municipality=Municipality::find($lista[$i]);
            $pathold=$municipality->path;
           if($pathold != null)
            {
                unlink(public_path('images\\municipalities\\'.$pathold));
           }

            $municipality->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' municipios han sido eliminadas satisfactoriamente')->important();
        }else{
            Flash::success('El municipio se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }


}
