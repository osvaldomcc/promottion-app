<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubCategory;
use App\Category;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\SubCategoriaRequest;
use App\Http\Requests\SubCategoriaEditRequest;
use App\Lang;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $subcategories=SubCategory::Search($request->name);
        return view('backend.subcategories.index')->with('subcategories',$subcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.subcategories.create')->with('categories',$categories)->with('langs',$langs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoriaRequest $request)
    {
        $subcategory=new SubCategory($request->all());
        $subcategory->save();

        Flash::success('La subcategoría '.$subcategory->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        return view('backend.subcategories.show')->with('subcategory',$subcategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories=Category::lists('slug','id');
        $langs=Lang::lists('language','id');
        return view('backend.subcategories.edit')->with('categories',$categories)->with('subcategory',$subcategory)->with('langs',$langs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoriaEditRequest $request, SubCategory $subcategory)
    {
        $subcategory->slug=null;
        $subcategory->update($request->all());
         Flash::success('La subcategoría '.$subcategory->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        Flash::success('La subcategoría '.$subcategory->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.subcategory.index');
    }

    public function delete($subcategory)
    {
        $lista=explode(',', $subcategory);

        for($i=0;$i<count($lista);$i++)
        {
            $subcategory=SubCategory::find($lista[$i]);
            $subcategory->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Las '.$cantidad.' subcategorías han sido eliminadas satisfactoriamente')->important();
        }else{
            Flash::success('La subcategoría se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }


}
