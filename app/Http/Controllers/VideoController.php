<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Bussine;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use App\Http\Requests\VideoRequest;
use App\Http\Requests\VideoEditRequest;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videos=Video::Search($request->name);
        return view('backend.videos.index')->with('videos',$videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bussines=Bussine::lists('slug','id');
        return view('backend.videos.create')->with('bussines',$bussines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        Video::create($request->all());
         Flash::success('El video se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('backend.videos.show')->with('video',$video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $bussines=Bussine::lists('slug','id');
        return view('backend.videos.edit')->with('video',$video)->with('bussines',$bussines);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoEditRequest $request, Video $video)
    {
        $video->update($request->all());
        Flash::success('El video se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.video.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
        Flash::success('El video se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.video.index');
    }

      public function delete($video)
    {
        $lista=explode(',', $video);

        for($i=0;$i<count($lista);$i++)
        {
            $video=Video::find($lista[$i]);
            $video->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' videos han sido eliminados satisfactoriamente')->important();
        }else{
            Flash::success('El video se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }

}
