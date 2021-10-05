<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lang;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class LangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages=Lang::orderBy('id','desc')->paginate(10);
        return view('backend.language.index')->with('languages',$languages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.language.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Lang::create($request->all());
        Flash::success('El idioma '.$request->language.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.language.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lang $language)
    {
        return view('backend.language.edit')->with('language',$language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lang $language)
    {
        $language->update($request->all());
        Flash::success('El idioma '.$request->language.' se ha ediado satisfactoriamente')->important();
        return redirect()->route('shoes.language.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lang $language)
    {
        $language->delete(); 
        Flash::success('El idioma '.$language->language.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.language.index');
    }
}
