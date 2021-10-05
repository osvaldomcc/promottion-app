<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bussine;
use App\Municipality;
use App\SubCategory;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\NegocioRequest;
use App\Http\Requests\NegocioEditRequest;
use App\Lang;
use Image;

class BussineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bussines=Bussine::Search($request->name);
        return view('backend.bussines.index')->with('bussines',$bussines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $municipalities=Municipality::lists('slug','id');
        $subcategories=SubCategory::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.bussines.create')->with('municipalities',$municipalities)->with('subcategories',$subcategories)->with('langs',$langs);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NegocioRequest $request)
    {
        $bussine= new Bussine($request->all());
            
         if($bussine->banner and $bussine->banner == 'on')
            {
                $bussine->banner=1;
            }else{
                $bussine->banner=0;
            }

            if($request->file('logo')!=null)
        {
            $photo=$request->file('logo');
            $name='imcc_logo_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('400','400')->save(public_path('images/logos/'.$name));
            $bussine->logo=$name;
        }

        $bussine->save();

         Flash::success('El negocio '.$request->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.bussine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bussine $bussine)
    {
        return view('backend.bussines.show')->with('bussine',$bussine);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bussine $bussine)
    {
        $municipalities=Municipality::lists('slug','id');
        $subcategories=SubCategory::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.bussines.edit')->with('municipalities',$municipalities)->with('subcategories',$subcategories)->with('bussine',$bussine)->with('langs',$langs);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NegocioEditRequest $request, Bussine $bussine)
    {
        $oldname=$bussine->slug;
        $pathold=$bussine->logo;        
        $bussine->fill($request->all());    
        $bussine->slug=$request->slug;
          if($bussine->banner and $bussine->banner == 'on')
            {
                $bussine->banner=1;
            }else{
                $bussine->banner=0;
            }
            
              if($request->file('logo')!=null)
            {

                   if($pathold != null){
                    unlink(public_path('images\\logos\\'.$pathold));
                   }

                $photo=$request->file('logo');
                $name='imcc_logo_'.time().'.'.$photo->getClientOriginalExtension();
                Image::make($photo)->resize('400','400')->save(public_path('images/logos/'.$name));
                $bussine->logo=$name;
            }

        $bussine->save();

        if($oldname!=$bussine->slug)
        {
            $namenew=$bussine->slug;
            $filterold=$oldname;

            if(file_exists(public_path('images/bussines/'.$filterold)))
            {
                rename(public_path('images/bussines/'.$filterold),public_path('images/bussines/'.$namenew));
            }
        }

        Flash::success('El negocio '.$request->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.bussine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussine $bussine)
    {
                $pictures=$bussine->pictures;
                $newname=$bussine->slug;    

                for($i=0;$i<count($pictures);$i++)
                {
                     if($pictures[$i]->path != null)
                    {
                        unlink(public_path('images\\bussines\\'.$newname.'\\'.$pictures[$i]->path));
                    }
                }

               if(file_exists(public_path('images/bussines/'.$newname)))
                {
                    rmdir(public_path('images/bussines/'.$newname));
                }        

            $bussine->delete();

        $bussine->delete();
         Flash::success('El negocio '.$bussine->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.bussine.index');
    }


     public function delete($bussine)
    {
        $lista=explode(',', $bussine);

        for($i=0;$i<count($lista);$i++)
        {
            $bussine=Bussine::find($lista[$i]);
                $pictures=$bussine->pictures;
                    $newname=$bussine->slug;    
                for($j=0;$j<count($pictures);$j++)
                {
                     if($pictures[$j]->path != null)
                    {
                        unlink(public_path('images\\bussines\\'.$newname.'\\'.$pictures[$j]->path));
                    }
                }

                   if(file_exists(public_path('images/bussines/'.$newname)))
                    {
                        rmdir(public_path('images/bussines/'.$newname));
                    }        

            $bussine->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' negocios han sido eliminados satisfactoriamente')->important();
        }else{
            Flash::success('El negocio se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }


}
