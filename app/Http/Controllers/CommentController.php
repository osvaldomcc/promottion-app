<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;
use App\User;
use App\Bussine;
use Laracasts\Flash\Flash;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments=Comment::Search($request->name);
        return view('backend.comments.index')->with('comments',$comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bussines=Bussine::lists('name','id');
        return view('backend.comments.create')->with('bussines',$bussines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment($request->all());
        $comment->user()->associate($request->user());

        if($comment->like and $comment->like == 'on')
        {
            $comment->like=1;
        }else{
            $comment->like=0;
        }
        $comment->save();

         Flash::success('El comentario '.$comment->title.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.comment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('backend.comments.show')->with('comment',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $bussines=Bussine::lists('name','id');
        return view('backend.comments.edit')->with('bussines',$bussines)->with('comment',$comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->fill($request->all());
         $comment->user()->associate($request->user());
         
        if($comment->like and $comment->like == 'on')
        {
            $comment->like=1;
        }else{
            $comment->like=0;
        }

        $comment->save();

         Flash::success('El comentario '.$comment->title.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.comment.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        Flash::success('El comentario '.$comment->title.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.comment.index');
    }



    public function delete($comment)
    {
        $lista=explode(',', $comment);

        for($i=0;$i<count($lista);$i++)
        {
            $comment=Comment::find($lista[$i]);
            $comment->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' comentarios han sido eliminadas satisfactoriamente')->important();
        }else{
            Flash::success('El comentario se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }


}
