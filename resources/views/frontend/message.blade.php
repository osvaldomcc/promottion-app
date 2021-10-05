@extends('layouts.app')


@section('content')
    
     <section>
          <div class="container">
                    
                    <!-- LEFT -->
                    <div class="col-lg-3 col-md-3 col-sm-4">
                    
                        <div class="thumbnail text-center">
                            @if($user->path)
                                <img src="{{ asset('images/avatars/'.$user->path) }}" alt="{{ $user->name }}" />
                            @endif
                            <h2 class="size-18 margin-top-10 margin-bottom-0">
                            {{ $user->name }}
                            @if($user->firstname)
                            {{ $user->firstname }}
                            @endif
                            </h2>
                            <h3 class="size-11 margin-top-0 margin-bottom-10 text-muted"></h3>
                        </div>


                  
                        <!-- info -->
                        <div class="box-light margin-bottom-30 wow fadeInLeft" ><!-- .box-light OR .box-light -->
                            <div class="row margin-bottom-20" style="margin-left:-35px;">
                                <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                                    <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">{{ trans('app.api.day') }}</h3>
                                    <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">{{ date('d') }}</h2>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                                    <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">{{ trans('app.api.month') }}</h3>
                                    <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">{{ date('m') }}</h2>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 text-center bold">
                                    <h3 class="size-11 margin-top-0 margin-bottom-10 text-info">{{ trans('app.api.year') }}</h3>
                                    <h2 class="size-30 margin-top-10 margin-bottom-0 font-raleway">{{ date('Y') }}</h2>
                                </div>
                            </div>
                            <!-- /info -->

                         
                        
                        </div>

                    </div>


                    <!-- RIGHT -->
                    <div class="col-lg-9 col-md-9 col-sm-8">

                        <!-- FLIP BOX -->
                        <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center nomargin">
                   
                            <div class="front">
                                <div class="box1 noradius">
                                    <div class="box-icon-title">

                                        <h2> {{ $user->name }}   @if($user->firstname)  {{ $user->firstname }}    @endif  &ndash; {{ trans('app.api.p') }}   </h2>
                                         @if($user->path)
                                           <center>
                                                <img class="thumbnail rounded" src="{{ asset('images/avatars/'.$user->path) }}" alt="{{ $user->name }}" width="60" height="80" />
                                           </center>
                                         @endif
                                    </div>
                                    <p>{{ trans('app.api.over') }}</p>
                                </div>
                            </div>

                            <div class="back">
                                <div class="box2 noradius">
                                    <h4>{{ trans('app.api.who') }}</h4>
                                    <hr />
                                    <p>
                                        @if($user->about)
                                            {{ $user->about }}
                                        @else
                                            {{ trans('app.api.nfinish') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /FLIP BOX -->

                        <center>
                            @include('flash::message')
                        </center>
                        {!! Form::open(['route'=>'front.enviarmensaje','method'=>'POST','class'=>'box-light margin-top-20']) !!}

                             <div class="box-inner">
                                <h4 class="uppercase">{{ trans('app.api.mt') }}
                                    <strong>
                                    {{ $user->name }}
                                    @if($user->firstname)
                                        {{ $user->firstname }}
                                    @endif
                                    </strong>
                                </h4>
                                    <div class="alert alert-success margin-bottom-30 minetext">
                                        <p>
                                            {{ trans('app.api.cuidad') }}
                                        </p>
                                </div>
                                <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                
                              @if(App::getLocale()=='es')
                                    {!! Form::textarea('body',null,['class'=>'form-control ','rows'=>5,'placeholder'=>'Deje su mensaje aquí...']) !!}
                                @else
                                    {!! Form::textarea('body',null,['class'=>'form-control ','rows'=>5,'placeholder'=>'Leave your message here...']) !!}
                                @endif
                                @if ($errors->has('body'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                               

                                </div>
                                <input type="text" name="comenter" value="{{ $user->id }}" class="hidden">
                                @if(Auth::user())
                                <input type="text" name="user_id" value="{{ Auth::user()->id }}" class="hidden">
                                @endif
                                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{ trans('app.api.sendm') }}</button>
                            </div>

                        {!! Form::close() !!}

                      
                       
                        

                    

                    </div>
                    
                </div>


     </section>
           
    
            
@endsection


