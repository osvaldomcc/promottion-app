<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\Http\Requests;
use Laracasts\Flash\Flash;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Message;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioEditRequest;
use App\Http\Requests\IntroRequest;
use App;

class UserController extends Controller
{

    public function admin()
    {
        $cantusers=User::all()->count();
        $messages=Message::where('comenter',1)->count();
        return view('backend.home')->with('cantusers',$cantusers)->with('messages',$messages);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if(Auth::user()->rol != 'super_admin')
        {
            return redirect()->route('admin');
        }
        $users=User::Search($request->name);
        return view('backend.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $lang=App::getLocale();
        if(Auth::user()->rol != 'super_admin')
        {
            return redirect()->route('admin');
        }
        $countries=Country::whereHas('lang', function ($query) use ($lang) {
                $query->where('langs.language','=',$lang);
                })->lists('name','id' );
        return view('backend.users.create')->with('countries',$countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {   
        $user= new User($request->all());
        $user->password=bcrypt($request->password);

        if($request->file('path')!=null)
        {
            $photo=$request->file('path');
            $name='imcc_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('460','700')->save(public_path('images/avatars/'.$name));
            $user->path=$name;
        }

         if($user->permite_email and $user->permite_email == 'on')
        {
         $user->permite_email=1;
        }else{
            $user->permite_email=0;
        }

        if($user->accept_terms and $user->accept_terms == 'on')
        {
         $user->accept_terms=1;
        }else{
            $user->accept_terms=0;
        }

        $user->save();

        Flash::success('El usuario '.$user->name.' se ha creado satisfactoriamente')->important();
        return redirect()->route('shoes.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        if(Auth::user()->rol != 'super_admin')
        {
            return redirect()->route('admin');
        }
        $user=User::find($id);
        return view('backend.users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $lang=App::getLocale();
         if(Auth::user()->rol != 'super_admin')
        {
            return redirect()->route('admin');
        }
        $user=User::find($id);
        $countries=Country::whereHas('lang', function ($query) use ($lang) {
                $query->where('langs.language','=',$lang);
                })->lists('name','id' );
        return view('backend.users.edit')->with('countries',$countries)->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioEditRequest $request, $id)
    {   
        $user=User::find($id);
        $passwordold=$user->password;
        $pathold=$user->path;
        $user->fill($request->all());

         if($user->permite_email and $user->permite_email == 'on')
        {
         $user->permite_email=1;
        }else{
            $user->permite_email=0;
        }

        if($user->accept_terms and $user->accept_terms == 'on')
        {
         $user->accept_terms=1;
        }else{
            $user->accept_terms=0;
        }

        if($request->password == null)
        {
            $user->password=$passwordold;
        }else{
            $user->password=bcrypt($request->password);
        }
        if($request->file('path')!=null)
        {
            if($pathold != 'default.jpg')
            {
               unlink(public_path('images\\avatars\\'.$pathold));

            }

            $photo=$request->file('path');
            $name='imcc_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('460','700')->save(public_path('images/avatars/'.$name));
            $user->path=$name;
        }
        $user->save();
        Flash::success('El usuario '.$user->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('shoes.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(Auth::user()->rol != 'super_admin')
        {
            return redirect()->route('admin');
        }
        $user=User::find($id);
        $pathold=$user->path;
          if($pathold != 'default.jpg')
            {
               unlink(public_path('images\\avatars\\'.$pathold));

            }
        $user->delete();
        Flash::success('El usuario '.$user->name.' se ha eliminado satisfactoriamente')->important();
        return redirect()->route('shoes.user.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginadmin');
    }


    public function intro(IntroRequest $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect()->route('admin');
        }
            return redirect()->route('loginadmin');
    }

      public function delete($user)
    {
        $lista=explode(',', $user);

        for($i=0;$i<count($lista);$i++)
        {
            $user=User::find($lista[$i]);
            $pathold=$user->path;
             if($pathold != 'default.jpg')
            {
               unlink(public_path('images\\avatars\\'.$pathold));

            }
            $user->delete();

        }
        $cantidad=count($lista);
        if($cantidad>1)
        {
            Flash::success('Los '.$cantidad.' usuarios han sido eliminados satisfactoriamente')->important();
        }else{
            Flash::success('El usuario se ha eliminado satisfactoriamente')->important();
        }
        return redirect()->back();
    }


    public function getprofile(User $user)
    {
        return view('backend.users.profile')->with('user',$user);
    }

    public function putprofile(Request $request,User $user)
    {
        $passwordold=$user->password;
        $pathold=$user->path;
        $user->fill($request->all());

        if($request->password == null)
        {
            $user->password=$passwordold;
        }else{
            $user->password=bcrypt($request->password);
        }
        if($request->file('path')!=null)
        {
            if($pathold != 'default.jpg')
            {
               unlink(public_path('images\\avatars\\'.$pathold));

            }

            $photo=$request->file('path');
            $name='imcc_'.time().'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize('460','700')->save(public_path('images/avatars/'.$name));
            $user->path=$name;
        }
        $user->save();
        Flash::success('El usuario '.$user->name.' se ha editado satisfactoriamente')->important();
        return redirect()->route('admin');
    }

    public function contactback(Request $request)
    {
        $mensajes=Message::Buscar($request->email);
        if($mensajes)
        {
          $mensajes->each(function($mensajes){
            $pic=explode('~',$mensajes->body);
            $mensajes->cuerpo=$pic[0];
            $mensajes->em=$pic[1];
          });
        }
        return view('backend.contactback')->with('mensajes',$mensajes);
    }

}
