<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\CategoriaRequest;
use App\Http\Requests\CategoriaEditRequest;
use App\Lang;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories=Category::Search($request->name);
        return view('backend.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langs=Lang::lists('language','id');
        return view('backend.categories.create')->with('langs',$langs);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        Category::create($request->all());
        Flash::success('La categoría '.$request->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.categories.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $langs=Lang::lists('language','id');
        return view('backend.categories.edit')->with('category',$category)->with('langs',$langs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaEditRequest $request, Category $category)
    {
        $category->slug=null;
        $category->update($request->all());
         Flash::success('La categoría '.$request->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
         Flash::success('La categoría '.$category->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.category.index');
    }

     public function delete($category)
    {
        $lista=explode(',', $category);

        for($i=0;$i<count($lista);$i++)
        {
            $category=Category::find($lista[$i]);
            $category->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Las '.$cantidad.' categorías han sido eliminadas satisfactoriamente')->important();
        }else{
            Flash::success('La categoría se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }



}
