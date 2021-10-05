<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\Bussine;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Image;
use App\Http\Requests\ImgRequest;
use App\Http\Requests\ImgEditRequest;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pictures=Picture::Search($request->name);
        return view('backend.pictures.index')->with('pictures',$pictures);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bussines=Bussine::lists('slug','id');
        return view('backend.pictures.create')->with('bussines',$bussines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImgRequest $request)
    {
         $picture= new Picture($request->all());
            
            $bussinename=$picture->bussine->slug;

          if(!file_exists(public_path('images/bussines/'.$bussinename)))
            {
                mkdir(public_path('images/bussines/'.$bussinename));
            }

        if($request->file('path')!=null)
        {
            $photo=$request->file('path');
            $name='imcc_bussine_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/bussines/'.$bussinename.'/'.$name));
            $picture->path=$name;
        }
        $picture->save();

        Flash::success('La imágen se ha creado satisfactoriamente')->important();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        return view('backend.pictures.show')->with('picture',$picture);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        $bussines=Bussine::lists('slug','id');
        return view('backend.pictures.edit')->with('bussines',$bussines)->with('picture',$picture);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImgEditRequest $request, Picture $picture)
    {
        $pathold=$picture->path;
        $picture->fill($request->all());

            $bussinename=$picture->bussine->slug;

           if(!file_exists(public_path('images/bussines/'.$bussinename)))
            {
                mkdir(public_path('images/bussines/'.$bussinename));
            }
       
        if($request->file('path')!=null)
        {
            if($pathold != null)
            {
                unlink(public_path('images\\bussines\\'.$bussinename.'\\'.$pathold));
               }

            $photo=$request->file('path');
            $name='imcc_bussine_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('1200','800')->save(public_path('images/bussines/'.$bussinename.'/'.$name));
            $picture->path=$name;
        }
        $picture->save();
        Flash::success('La imágen se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.picture.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
         
        $pathold=$picture->path;
        $negocioviejo=$picture->bussine->slug;
        
        
        
        if($pathold != null)
        {
                unlink(public_path('images\\bussines\\'.$negocioviejo.'\\'.$pathold));
         }

        $picture->delete();     
        
        $cantpictures=scandir(public_path('images\\bussines\\'.$negocioviejo));

        if(count($cantpictures)==2 and file_exists(public_path('images\\bussines\\'.$negocioviejo)))
        {
            rmdir(public_path('images\\bussines\\'.$negocioviejo));
        }

        Flash::success('La imágen se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.picture.index');
    }


    public function delete($picture)
    {
        $lista=explode(',', $picture);
        
        for($i=0;$i<count($lista);$i++)
        {
            $picture=Picture::find($lista[$i]);
            
            $pathold=$picture->path;
            
            $negocioviejo=$picture->bussine->slug;
             if($pathold != null)
            {
               unlink(public_path('images\\bussines\\'.$negocioviejo.'\\'.$pathold));
            }
            $picture->delete();

         $cantpictures=scandir(public_path('images\\bussines\\'.$negocioviejo));

        if(count($cantpictures)==2 and file_exists(public_path('images\\bussines\\'.$negocioviejo)))
        {
            rmdir(public_path('images\\bussines\\'.$negocioviejo));
        }

        }

        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Las '.$cantidad.' imágenes han sido eliminadas satisfactoriamente')->important();
        }else{
            Flash::success('La imágen se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }



}
