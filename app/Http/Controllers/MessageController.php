<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\Http\Requests;
use Laracasts\Flash\Flash;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $messages=Message::Search($request->name);
        
        return view('backend.messages.index')->with('messages',$messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('backend.messages.show')->with('message',$message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        Flash::success('El mensaje se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.message.index');
    }


    public function delete($message)
    {
        $lista=explode(',', $message);

        for($i=0;$i<count($lista);$i++)
        {
            $message=Message::find($lista[$i]);
            $message->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' mensajes han sido eliminados satisfactoriamente')->important();
        }else{
            Flash::success('El mensaje se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }
}
